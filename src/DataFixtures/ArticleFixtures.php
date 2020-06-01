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
                 ->setContenu($faker->text($maxNbChars = 200))
                 ->setImage("Aghata.jpg");

        $manager->persist($article1);

                
        $article2 = new Article();
        $article2->setTitre("Notre dernier sauvetage !")
                ->setContenu($faker->text($maxNbChars = 200))
                ->setImage("Aghata.jpg");

        $manager->persist($article2);

        $article3 = new Article();
        $article3->setTitre("Kitty enfin adoptée !")
                ->setContenu($faker->text($maxNbChars = 200))
                ->setImage("Aghata.jpg");

        $manager->persist($article3);



        $manager->flush();
    }
}
