<?php
namespace Cp\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
/**
 * Description of ProgrammeType
 *
 * @author Benjamin
 */
class ProgrammeType extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        ->add('date', 'date', array(
            'label' => 'Date de début',
        ))       
        ->add('films', 'entity', array(
            'class' => 'CpFilmBundle:Film',
            'property' => 'titre',
            'multiple' => true,
        ));
    }
    
    public function getName()
    {
        return 'cp_adminbundle_programmetype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Cp\Bundle\ProgrammeBundle\Entity\Programme',
        );
    }
}

?>
