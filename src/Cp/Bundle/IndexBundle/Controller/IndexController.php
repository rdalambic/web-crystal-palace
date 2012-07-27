<?php

namespace Cp\Bundle\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class IndexController extends Controller
{
    
    public function homepageAction()
    {
        $wed = $this->get('programme.wed_date')->getWedDate();
        $date = $this->get('core.sql_date')->frUs($wed);
        
        $programme = $this->getDoctrine()->getEntityManager()->getRepository('CpProgrammeBundle:Programme')->findOneByDate(new \DateTime($date));
        return $this->render('CpIndexBundle:Index:index.twig.tpl', array(
            'programme' => $programme,
        ));
    }
}
