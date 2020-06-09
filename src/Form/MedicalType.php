<?php

namespace App\Form;

use App\Entity\Medical;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MedicalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fiv', ChoiceType::class, [    
                'choices'  => [
                    'Positif' => 'Positif',
                    'Négatif' => 'Négatif'
                ],
            ])
            ->add('felv', ChoiceType::class, [    
                'choices'  => [
                    'Positif' => 'Positif',
                    'Négatif' => 'Négatif'
                ],
            ])
            ->add('Sterilisation', ChoiceType::class, [    
                'choices'  => [
                    'Fait' => 'Fait',
                    ' À faire' => 'À faire'
                ],
            ])
            ->add('vaccin', ChoiceType::class, [    
                'choices'  => [
                    'Fait' => 'Fait',
                    ' À faire' => 'À faire'
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medical::class,
        ]);
    }
}
