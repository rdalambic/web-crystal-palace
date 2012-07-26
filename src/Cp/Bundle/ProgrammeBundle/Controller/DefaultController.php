<?php

namespace Cp\Bundle\ProgrammeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('CpProgrammeBundle:Default:index.html.twig', array('name' => $name));
    }
}
