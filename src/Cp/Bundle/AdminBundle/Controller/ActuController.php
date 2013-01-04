<?php

namespace Cp\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Cp\Bundle\ActuBundle\Entity\Actu;
use Cp\Bundle\AdminBundle\Form\Type\ActuType;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of ActuController
 *
 * @author Benjamin
 */
class ActuController extends Controller {
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()->getEntityManager()->getRepository('CpActuBundle:Actu')->findAll();
        
        return $this->render('CpAdminBundle:Actu:index.twig.tpl', array(
            'news' => $news,
        ));
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function ajouterAction(Request $request)
    {
        $actu = new Actu();
        
        $form = $this->createForm(new ActuType(), $actu);
        
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            
            if($form->isValid())
            {
                $form->setData($actu);
                $actu->setDate(new \DateTime());
                $em->persist($actu);
                $em->flush();
                
                return $this->redirect($this->generateUrl('gerer_actu'));
            }
        }
        
        return $this->render('CpAdminBundle:Actu:add.twig.tpl', array(
            'form' => $form->createView(),
        ));
    }
    
    public function editerAction(Request $request, $id)
    {
        $actu = $this->getDoctrine()->getEntityManager()->getRepository('CpActuBundle:Actu')->find($id);
        
        if(!$actu)
            $this->createNotFoundException ();
        
        $form = $this->createForm(new ActuType(), $actu);
        
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            
            if($form->isValid())
            {                
                $em->persist($form->getData());
                $em->flush();
                
                return $this->redirect($this->generateUrl('gerer_actu'));
            }
        }
        
        return $this->render('CpAdminBundle:Actu:edit.twig.tpl', array(
            'form' => $form->createView(),
        ));
    }
    
}

?>
