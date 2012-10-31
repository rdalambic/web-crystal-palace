<?php

namespace Cp\Bundle\SeanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $dateService = $this->get('programme.wed_date');
        
        $programme = $this->getDoctrine()->getEntityManager()->getRepository('CpProgrammeBundle:Programme')->findOneByDate(new \DateTime($this->get('core.sql_date')->frUs($dateService->getWedDate())));
        
        return $this->render('CpSeanceBundle:Default:index.twig.tpl', array(
            'programme' => $programme,
        ));        
    }
}
