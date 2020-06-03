<?php

namespace App\DataFixtures;

use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\Espece;
use App\Entity\Medical;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $espece1 = new Espece();
        $espece1->setNomEspece("chat");
        $manager->persist($espece1);

        $espece2 = new Espece();
        $espece2->setNomEspece("chien");
        $manager->persist($espece2);

        $espece3 = new Espece();
        $espece3->setNomEspece("autres");
        $manager->persist($espece3);


        $race1 = new Race();
        $race1->setNomRace("Non défini")
             ->setCouleurPelage("Tigré gris")
             ->setLongueurPelage("poil court")
             ->setEspece($espece1);
        $manager->persist($race1);

        $race2 = new Race();
        $race2->setNomRace("Main Coon")
             ->setCouleurPelage("Gris tigré et blanc sur le ventre")
             ->setLongueurPelage("poil long")
             ->setEspece($espece1);
        $manager->persist($race2);

        $race3 = new Race();
        $race3->setNomRace("Croisé")
             ->setCouleurPelage("Chocolat")
             ->setLongueurPelage("poil frisé")
             ->setEspece($espece2);
        $manager->persist($race3);

        $race4 = new Race();
        $race4->setNomRace("Labrador")
             ->setCouleurPelage("Noir")
             ->setLongueurPelage("poil court")
             ->setEspece($espece2);
        $manager->persist($race4);

        $race5 = new Race();
        $race5->setNomRace("Lapin")
             ->setCouleurPelage("Blanc et noir")
             ->setLongueurPelage("poil long")
             ->setEspece($espece3);
        $manager->persist($race5);

        $faker = \Faker\Factory::create('fr_FR');
        $medical1 = new Medical();
        $medical1 ->setFiv($faker->numberBetween($min = 0, $max = 1))
                  ->setFelv($faker->numberBetween($min = 0, $max = 1))
                  ->setSterilisation($faker->numberBetween($min = 0, $max = 1))
                  ->setVaccin($faker->numberBetween($min = 0, $max = 1))
                  ->setDetails("RAS");
        $manager->persist($medical1);



        $races = [$race1, $race2, $race3, $race4];

        $faker = \Faker\Factory::create('fr_FR');
        foreach($races as $r) {
            for($i=1; $i <= 10; $i++) {
                $animal = new Animal();
                $animal->setNom($faker->name())
                       ->setSexe($faker->numberBetween($min = 0, $max = 1))
                       ->setDateNaissance(new \DateTime($faker->date($format = 'Y-m-d', $max = 'now')))        
                       ->setRace($r)  
                       ->setCaractere($faker->text($maxNbChars = 200))
                       ->setHistoire($faker->text($maxNbChars = 200))
                       ->setCompatibiliteChat($faker->numberBetween($min = 0, $max = 1))
                       ->setCompatibiliteChien($faker->numberBetween($min = 0, $max = 1))
                       ->setCompatibiliteEnfant($faker->numberBetween($min = 0, $max = 1))
                       ->setMedical($medical1)
                       ->setPhoto("agatha.jpg")
                       ->setDisponible($faker->numberBetween($min = 0, $max = 1));

                       $manager->persist($animal);

            }
        }

        $manager->flush();
    }
}
