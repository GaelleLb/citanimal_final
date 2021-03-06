<?php

namespace App\Form;

use App\Entity\Race;
use App\Entity\Espece;
use App\Entity\RechercheAnimal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RechercheAnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder



        ->add('race', EntityType::class, [
            // looks for choices from this entity
            'class' => Espece::class,
            'required' => false,
            'label' => false,
            'placeholder' => "Espèce",
            'mapped' => false,
            
            // uses the User.username property as the visible option string
            'choice_label' => 'nom_espece',
 
        ])

        ->add('sexe', ChoiceType::class, [
            'required' => false, 
            'label' => false,
            'placeholder' => "Sexe",

            'choices'  => [
                'Mâle' => 'Mâle',
                'Femelle' => 'Femelle'
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RechercheAnimal::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix() {
        return '';
    }
}
