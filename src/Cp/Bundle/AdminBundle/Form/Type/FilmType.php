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
class FilmType extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        ->add('titre')
        ->add('realisateur')
        ->add('acteurs')
        ->add('duree_h')
        ->add('duree_m')
        ->add('version', 'choice', array(
            'choices' => array(
                'vf' => 'VF',
                'vo' => 'VO',
                'stf' => 'VOSTF'
            )
        ))
        ->add('resume')
        ->add('fiche')
        ->add('affiche');
    }
    
    public function getName()
    {
        return 'cp_adminbundle_filmtype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Cp\Bundle\FilmBundle\Entity\Film',
        );
    }
}

?>
