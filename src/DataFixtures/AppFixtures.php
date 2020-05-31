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

        $medical1 = new Medical();
        $medical1 ->setFiv(0)
                  ->setFelv(0)
                  ->setSterilisation(1)
                  ->setVaccin(1)
                  ->setDetails("RAS");
        $manager->persist($medical1);

        $races = [$race1, $race2, $race3, $race4];

        $faker = \Faker\Factory::create('fr_FR');
        foreach($races as $r) {
            $rand = rand(3,5);
            for($i=1; $i <= $rand; $i++) {
                $animal = new Animal();
                $animal->setNom($faker->name())
                       ->setSexe("Femelle")
                       ->setDateNaissance(new \DateTime($faker->date($format = 'Y-m-d', $max = 'now')))        
                       ->setRace($r)               
                       ->setCaractere($faker->text($maxNbChars = 200))
                       ->setHistoire($faker->text($maxNbChars = 200))
                       ->setDescription($faker->text($maxNbChars = 200))
                       ->setCompatibiliteChat("Ok chat")
                       ->setCompatibiliteChien("Ok chien")
                       ->setCompatibiliteEnfant("Ok enfant")
                       ->setMedical($medical1)
                       ->setPhoto("aghata.jpg");

                       $manager->persist($animal);

            }
        }

        $manager->flush();
    }
}
