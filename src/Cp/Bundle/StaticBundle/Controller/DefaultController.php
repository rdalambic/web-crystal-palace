<?php

namespace Cp\Bundle\StaticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($slug)
    {
        $page = $this->getDoctrine()->getEntityManager()->getRepository('CpStaticBundle:Page')->findOneBySlug($slug);
        
        if(!$page)
        {
            throw $this->createNotFoundException('Page non trouvée');
        }
        
        return $this->render('CpStaticBundle:Default:page.twig.tpl', array(
            'content' => $page->getContent(),
            'title' => $page->getTitle(),
        ));
    }
}
