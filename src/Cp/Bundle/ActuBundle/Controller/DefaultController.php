<?php

namespace Cp\Bundle\ActuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('CpActuBundle:Default:index.html.twig', array('name' => $name));
    }
}
