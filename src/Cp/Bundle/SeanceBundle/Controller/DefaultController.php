<?php

namespace Cp\Bundle\SeanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('CpSeanceBundle:Default:index.html.twig', array('name' => $name));
    }
}
