<?php

namespace Meritt\ExamBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvaluationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('exam')
            ->add('student')
            ->add('alternative')
            ->add('question')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Meritt\ExamBundle\Entity\Evaluation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'meritt_exambundle_evaluation';
    }
}
