<?php

namespace Cp\Bundle\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Collection;

class DefaultController extends Controller {

    public function indexAction(Request $request) {          
        
        $constraintsCollection = new Collection(array(
            'email' => new Email(),
            'sujet' => new NotBlank(),
            'msg'   => new NotBlank(),
        ));
        
        $form = $this->createFormBuilder(null, array(
            'validation_constraint' => $constraintsCollection,
        ))
                ->add('email', 'email')
                ->add('sujet', 'text')
                ->add('msg', 'textarea')
                ->getForm();
        
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            
            if($form->isValid())
            {
                $data = $form->getData();
                
                $message = \Swift_Message::newInstance()
                        ->setSubject('Contact du site - '.$data['sujet'])
                        ->setFrom('noreply@crystal-palace.fr')
                        ->setTo('darkbenji58@gmail.com')
                        ->setBody('Nouveau message de '.$data['email'].'<br />'.$data['msg']);
                
                $this->get('mailer')->send($message);
                
                $this->redirect($this->generateUrl('homepage'));
            }
        }

        return $this->render('CpContactBundle:Default:index.twig.tpl', array(
            
        ));
    }

}
