<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cp\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
/**
 * Description of FilmType
 *
 * @author Benjamin
 */
class ActuType extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        ->add('titre')
        ->add('contenu')
        ->add('affichage', 'choice', array(
            'choices' => array(
                '0' => "Page d'accueil", '1' => "AMC",
            ),
        ));
    }
    
    public function getName()
    {
        return 'cp_adminbundle_actutype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Cp\Bundle\ActuBundle\Entity\Actu',
        );
    }
}

?>
