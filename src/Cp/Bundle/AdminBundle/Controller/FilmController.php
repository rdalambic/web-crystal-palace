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
    public function ajouterAction()
    {
        $film = new Film();
        $form = $this->createForm(new FilmType(), $film);
        
        return $this->render('CpAdminBundle:Film:add.twig.tpl', array(
            'form' => $form->createView(),
        ));        
    }
}

?>
