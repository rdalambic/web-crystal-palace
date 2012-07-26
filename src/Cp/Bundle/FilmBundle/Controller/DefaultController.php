<?php

namespace Cp\Bundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('CpFilmBundle:Default:index.html.twig', array('name' => $name));
    }
}
