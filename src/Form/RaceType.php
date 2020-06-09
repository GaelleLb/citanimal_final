<?php

namespace App\Form;

use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('espece', EspeceType::class)

            ->add('nom_race', EntityType::class, [
                // looks for choices from this entity
                'class' => Race::class,    
                'label' => 'Race',
                // uses the User.username property as the visible option string
                'choice_label' => 'nom_race',
            ])
            
            ->add('couleur_pelage', ChoiceType::class, [    
                'choices'  => [
                    'Ecaille de tortue' => 'Ecaille de tortue',
                    'Gris' => 'Gris',
                    'Roux' => 'Roux',
                    'Tricolore' => 'Tricolore',
                ],
            ])
            ->add('longueur_pelage', ChoiceType::class, [    
                'choices'  => [
                    'Court' => 'court',
                    ' Mi-long' => 'Mi-long',
                    'Long' => 'Long',
                    'Frisé' => 'Frisé'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Race::class,
        ]);
    }
}
