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
}

?>
