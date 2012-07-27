<?php

namespace Cp\Bundle\ProgrammeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function hebdoAction()
    {
        $dateService = $this->get('programme.wed_date');
        $date = $this->get('core.sql_date')->frUs($dateService->getWedDate());
        $programme = $this->getDoctrine()->getEntityManager()->getRepository('CpProgrammeBundle:Programme')->findOneByDate(new \DateTime($date));
        
        
        
        return $this->render('CpProgrammeBundle:Default:hebdo.twig.tpl', array(
            'programme' => $programme,
            'dateDebut' => $dateService->getWedDate(),
            'dateFin'   => $dateService->getLastDate(),            
        ));
    }
}
