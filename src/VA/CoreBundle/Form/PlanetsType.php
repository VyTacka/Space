<?php

namespace VA\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlanetsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('attr' => array(
                'placeholder' => 'Name'
            )))
            ->add('description', 'textarea', array('attr' => array(
                'rows' => 10,
                'placeholder' => 'Description'
            )))
            ->add('system', 'entity', array(
                'class' => 'VA\CoreBundle\Entity\Systems',
                'empty_value' => 'Choose Star System',
                'required' => true,
            ))
            ->add('order', 'integer', array('attr' => array(
                'placeholder' => 'Position'
            )))
            ->add('imgUrl', 'text', array('attr' => array(
                'placeholder' => 'Image URL',
            )));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VA\CoreBundle\Entity\Planets'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'va_corebundle_planets';
    }
}
