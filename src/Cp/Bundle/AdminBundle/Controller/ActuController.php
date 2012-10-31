<?php

namespace Cp\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use JMS\SecurityExtraBundle\Annotation\Secure;
/**
 * Description of ActuController
 *
 * @author Benjamin
 */
class ActuController extends Controller {
    
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function indexAction()
    {
        
    }
}

?>
