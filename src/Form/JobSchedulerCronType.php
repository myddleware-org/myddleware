<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class JobSchedulerCronType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enable', CheckboxType::class, [
            'label' => 'Active',
            'required' => false,
             ])
            ->add('arguments', TextType::class)
            ->add('description', TextType::class)
            ->add('maxInstances', IntegerType::class)
            ->add('number', IntegerType::class)
            ->add('period', TextType::class)
            ->add('save', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-success',
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Shapecode\Bundle\CronBundle\Entity\CronJob',
        ]);
    }
}
