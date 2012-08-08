<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cp\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Description of AdminController
 *
 * @author Benjamin
 */
class AdminController extends Controller {
    
    /**
     *
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function indexAction()
    {
        return $this->render('CpAdminBundle:Admin:index.twig.tpl');
    }
}

?>
