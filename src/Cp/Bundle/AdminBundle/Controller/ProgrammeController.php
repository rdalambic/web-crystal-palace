<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cp\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use Cp\Bundle\ProgrammeBundle\Entity\Programme;
use Symfony\Component\HttpFoundation\Response;
use Cp\Bundle\AdminBundle\Form\Type\ProgrammeType;
use Cp\Bundle\SeanceBundle\Entity\Seance;

/**
 * Description of ProgrammeControler
 *
 * @author Benjamin
 */
class ProgrammeController extends Controller {
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function gererAction()
    {
        $progs = $this->getDoctrine()->getEntityManager()->getRepository('CpProgrammeBundle:Programme')->findBy(array(), array(
            'id' => 'desc',
        ));
        
        return $this->render('CpAdminBundle:Programme:index.twig.tpl', array(
            'progs' => $progs,
        ));
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function ajouterAction(Request $request)
    {
        $programme = new Programme();
        
        $form = $this->createForm(new ProgrammeType(), $programme, array());
        
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            
            if($form->isValid())
            {
                $form->setData($programme);
                $em->persist($programme);
                $em->flush();
                
                return $this->redirect($this->generateUrl('gerer_programme'));
            }            
        }
        
        return $this->render('CpAdminBundle:Programme:add.twig.tpl', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function editerAction($id, Request $request)
    {
        $programme = $this->getDoctrine()->getEntityManager()->getRepository('CpProgrammeBundle:Programme')->find($id);
        
        if(!$programme)
        {
            $this->createNotFoundException();
        }
        
        $form = $this->createForm(new ProgrammeType(), $programme);
        
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            
            $em = $this->getDoctrine()->getEntityManager();
            
            if($form->isValid())
            {
                $em->persist($programme);
                $em->flush();
                
                return $this->redirect($this->generateUrl('gerer_programme'));
            }
        }
        
        return $this->render('CpAdminBundle:Programme:edit.twig.tpl', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $programme = $em->getRepository('CpProgrammeBundle:Programme')->find($id);
        
        if(!$programme)
        {
            $this->createNotFoundException();
        }
        
        $em->remove($programme);
        $em->flush();
        
        return $this->redirect($this->generateUrl('gerer_programme'));
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function ajouterHorairesAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $programme = $em->getRepository('CpProgrammeBundle:Programme')->find($id);
        
        if(!$programme)
        {
            $this->createNotFoundException('Programme inexistant !');
        }
        
        $films = $programme->getFilms();
        $filmsAndShows = array(); //Contient le film + ses horaires
        
        foreach ($films as $f)
        {
            //Récupération des séances du film pour le programme demandé
            $shows = $em->getRepository('CpSeanceBundle:Seance')->findBy(array(
                'film' => $f->getId(),
                'programme' => $programme->getId(),
            ));
            
            //Ajout au tableau
            $filmsAndShows[] = array(
                'film' => $f,
                'shows' => $shows,
            );
        }
        
        //print_r($filmsAndShows);
        
        return $this->render('CpAdminBundle:Programme:horaires.twig.tpl', array(
            'films' => $filmsAndShows,
            'idProgramme' => $programme->getId(),
        ));      
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function addShowAction()
    {
        if(!$this->getRequest()->isXmlHttpRequest())
        {
            throw new \Exception("Erreur : Vous ne pouvez pas accéder à cette page.", 403);
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $film = $em->getRepository('CpFilmBundle:Film')->find($this->getRequest()->get('film'));
        $programme = $em->getRepository('CpProgrammeBundle:Programme')->find($this->getRequest()->get('programme'));
        $show = new Seance();        
        
        $show->setDate(new \DateTime($this->getRequest()->get('date')));
        $show->setFilm($film);
        $show->setProgramme($programme);
        $show->setSalle($this->getRequest()->get('salle'));
        
        $em->persist($show);
        $em->flush();
        
        return new Response($show->getId(), 200);
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function delShowAction()
    {
        if(!$this->getRequest()->isXmlHttpRequest())
        {
            throw new \Exception("Erreur : Vous ne pouvez pas accéder à cette page.", 403);
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $show = $em->getRepository('CpSeanceBundle:Seance')->find($this->getRequest()->get('id'));
        
        if(!$show)
        {
            throw $this->createNotFoundException('Seance inexistante.');
        }
        
        $em->remove($show);
        $em->flush();
        
        return new Response('', 200);
    }
}

?>
