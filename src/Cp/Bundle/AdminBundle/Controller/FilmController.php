<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cp\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Cp\Bundle\FilmBundle\Entity\Film;
use Cp\Bundle\AdminBundle\Form\Type\FilmType;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of FilmController
 *
 * @author Benjamin
 */
class FilmController extends Controller {
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function gererAction()
    {
        $films = $this->getDoctrine()->getEntityManager()->getRepository('CpFilmBundle:Film')->findBy(array(), array(
            'id' => 'desc',
            ));
        
        return $this->render('CpAdminBundle:Film:index.twig.tpl', array(
            'films' => $films,
        ));
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function ajouterAction(Request $request)
    {
        $film = new Film();        
        $form = $this->createForm(new FilmType(), $film);
        
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            
            if($form->isValid())
            {
                $form->setData($film);
                $em->persist($film);
                $em->flush();
                
                return $this->redirect($this->generateUrl('gerer_film'));
            }
        }
        
        return $this->render('CpAdminBundle:Film:add.twig.tpl', array(
            'form' => $form->createView(),
        ));        
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function editerAction($id, Request $request)
    {
        $film = $this->getDoctrine()->getEntityManager()->getRepository('CpFilmBundle:Film')->find($id);        
        
       if(!$film)
        {
            $this->createNotFoundException("Ce film n'existe pas.");
        }
        
        $form = $this->createForm(new FilmType(), $film);
        
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            
            if($form->isValid())
            {                
                $em->persist($form->getData());
                $em->flush();
                
                return $this->redirect($this->generateUrl('gerer_film'));
            }
        }
        
        return $this->render('CpAdminBundle:Film:edit.twig.tpl', array(
            'form' => $form->createView(),
        ));
    }
    
    public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $film = $em->getRepository('CpFilmBundle:Film')->find($id);
        
        if(!$film)
        {
            $this->createNotFoundException("Ce film n'existe pas.");
        }
        
        $em->remove($film);
        $em->flush();
        
        return $this->redirect($this->generateUrl('gerer_film'));
    }
}

?>
