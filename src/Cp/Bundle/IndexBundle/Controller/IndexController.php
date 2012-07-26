<?php

namespace Cp\Bundle\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class IndexController extends Controller
{
    
    public function homepageAction()
    {
        return $this->render('CpIndexBundle:Index:index.twig.tpl');
    }
}
