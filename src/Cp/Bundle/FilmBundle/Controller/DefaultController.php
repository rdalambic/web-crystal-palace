<?php

namespace Cp\Bundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cp\Bundle\FilmBundle\Entity\Film;


class DefaultController extends Controller
{
    
    public function ficheAction($id)
    {
        $film = $this->getDoctrine()->getEntityManager()->getRepository('CpFilmBundle:Film')->find($id);
        
        if(!$film)
        {
            throw $this->createNotFoundException('Ce film n\'existe pas');
        }
        
        return $this->render('CpFilmBundle:Default:fiche.twig.tpl', array(
            'film' => $film,
        ));
    }
}
