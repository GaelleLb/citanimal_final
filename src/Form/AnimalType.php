<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('sexe')
            ->add('date_naissance')
            ->add('caractere')
            ->add('histoire')
            ->add('compatibilite_chien')
            ->add('compatibilite_chat')
            ->add('compatibilite_enfant')
            ->add('photo')
            ->add('disponible')
            ->add('medical')
            ->add('race')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
