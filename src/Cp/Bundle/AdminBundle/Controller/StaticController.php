<?php
namespace Cp\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of StaticController
 *
 * @author Benjamin
 */
class StaticController extends Controller {
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function indexAction()
    {
        $pages = $this->getDoctrine()->getRepository('CpStaticBundle:Page')->findAll();
        
        return $this->render('CpAdminBundle:Static:index.twig.tpl', array(
            'pages' => $pages,
        ));
    }
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function editAction($id)
    {
        if(!$this->getRequest()->isXmlHttpRequest())
        {
            throw $this->createNotFoundException('Acces direct interdit');
        }
        
        $page = $this->getDoctrine()->getEntityManager()->getRepository('CpStaticBundle:Page')->find($id);
        
        if(!$page)
        {
            throw $this->createNotFoundException('Page non trouvée');
        }
        
        return $this->render('CpAdminBundle:Static:edit.twig.tpl', array(
            'page' => $page->getContent(),
        ));
    }
    
    public function saveAction(Request $request)
    {
        if(!$request->isXmlHttpRequest())        
            throw $this->createNotFoundException('Accès direct interdit');
        
        
        if($request->getMethod() != 'POST')        
            throw $this->createNotFoundException('Accès par POST uniquement');
        
        
        $em = $this->getDoctrine()->getEntityManager();
        $page = $em->getRepository('CpStaticBundle:Page')->find($request->get('id'));
        
        
        if(!$page)
            throw $this->createNotFoundException ('Page inconnue');
        
        $page->setContent($request->get('content'));       
        $em->flush();
        
        return new Response(null, 200);
    }
}

?>
