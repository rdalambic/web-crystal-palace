<?php
namespace Cp\Bundle\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
/**
 * Description of SeanceType
 *
 * @author Benjamin
 */
class SeanceType extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        ->add('date', 'date', array(
            'label' => 'Date et heure',
        ))       
        ->add('salle', 'choice', array(
            'choices' => array(
                1 => '1',
                2 => '2',
            ),
        ));
    }
    
    public function getName()
    {
        return 'cp_adminbundle_seancetype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Cp\Bundle\SeanceBundle\Entity\Seance',
        );
    }
}

?>
