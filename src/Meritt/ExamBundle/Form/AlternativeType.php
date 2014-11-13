<?php

namespace Meritt\ExamBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlternativeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alternativeText')
            ->add('isCorrect')
            ->add('alternativeLabel')
            ->add('question')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Meritt\ExamBundle\Entity\Alternative'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'meritt_exambundle_alternative';
    }
}
