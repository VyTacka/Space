<?php

namespace VA\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SystemsType extends AbstractType
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
            ->add('imgUrl', 'url', array('attr' => array(
                'placeholder' => 'Image Url',
            )));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VA\CoreBundle\Entity\Systems'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'va_corebundle_systems';
    }
}
