<?php

namespace App\Form;

use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\Espece;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')

            ->add('espece', EntityType::class, [
                // looks for choices from this entity
                'class' => Espece::class,    
                'label' => 'Espèce',
                // uses the User.username property as the visible option string
            ])

            ->add('race', EntityType::class, [
                // looks for choices from this entity
                'class' => Race::class,    
                'label' => 'Race',

                // uses the User.username property as the visible option string
            ])
            
            ->add('sexe', ChoiceType::class, [    
                'choices'  => [
                    'Mâle' => 'Mâle',
                    'Femelle' => 'Femelle'
                ],
            ])
            
            ->add('date_naissance', DateType::class, [
                'label' => 'Date de Naissance'
            ])
            
            ->add('caractere')

            ->add('histoire')

            ->add('couleur_pelage', ChoiceType::class, [    
                'choices'  => [
                    'Blanc' => 'Blanc',
                    'Blanc et noir' => 'Blanc et noir',
                    'Gris' => 'Gris',
                    'Noir' => 'Noir',
                    'Roux' => 'Roux',
                    'Trigré Gris' => 'Tigré Gris',
                    'Tigré gris, ventre blanc' => 'Tigré gris, ventre blanc',
                    'Tigré roux' => 'Tigré roux',
                    'Tigré roux, ventre blanc' => 'Tigré roux, ventre blanc',
                    'Tricolore' => 'Tricolore',
                ],
            ])

            ->add('longueur_pelage', ChoiceType::class, [    
                'choices'  => [
                    'Court' => 'Court',
                    'Mi-long' => 'Mi-long',
                    'Long' => 'Long',
                    'Frisé' => 'Frisé',
                    'Sans poils' => 'Sans poils',
                ],
            ])

            ->add('compatibilite_chat')
            ->add('compatibilite_chien')
            ->add('compatibilite_enfant')

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

            ->add('sterilisation', ChoiceType::class, [    
                'choices'  => [
                    'Fait' => 'Fait',
                    'A Faire' => 'A faire'
                ],
            ])

            ->add('vaccin', ChoiceType::class, [    
                'choices'  => [
                    'Fait' => 'Fait',
                    'A Faire' => 'A faire'
                ],
            ])

            ->add('details')

            ->add('imageFile', FileType::class, ['required' => false])

            ->add('disponible', ChoiceType::class, [
                'label' => 'Disponible à l\'adoption',
                'choices'  => [
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ],
            ]);

            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
