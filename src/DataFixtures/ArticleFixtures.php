<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $article1 = new Article();
        $article1->setTitre("Urgence Famille d'Accueil !")
                 ->setSousTitre("ceci est un sous-titre")
                 ->setContenu($faker->text($maxNbChars = 2000))
                 ->setImage("ronron.jpg");

        $manager->persist($article1);

                
        $article2 = new Article();
        $article2->setTitre("Notre dernier sauvetage !")
                ->setSousTitre("ceci est un sous-titre")
                ->setContenu($faker->text($maxNbChars = 2000))
                ->setImage("sauvetage_notre_dame_du_saint_cordon.jpg");

        $manager->persist($article2);

        for ($i=1; $i<10; $i++) {
            $article3 = new Article();
            $article3->setTitre("Kitty enfin adoptée !")
                    ->setSousTitre("ceci est un sous-titre")
                    ->setContenu($faker->text($maxNbChars = 2000))
                    ->setImage("agatha.jpg");
    
            $manager->persist($article3);
        }




        $manager->flush();
    }
}
