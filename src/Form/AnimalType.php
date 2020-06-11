<?php

namespace App\Form;

use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\Espece;
use App\Entity\Medical;
use App\Form\EspeceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

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
                'mapped' => false,
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

            ->add('Stérilisation', ChoiceType::class, [    
                'choices'  => [
                    'Fait' => 'Fait',
                    'A Faire' => 'A faire'
                ],
            ])

            ->add('sterilisation', ChoiceType::class, [    
                'choices'  => [
                    'Fait' => 'Fait',
                    'A Faire' => 'A faire'
                ],
            ])

            ->add('details')

            ->add('photo')
            ->add('disponible', CheckboxType::class, [
                'label' => 'Disponible à l\'adoption',
                'required' => false
            ]);

            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
