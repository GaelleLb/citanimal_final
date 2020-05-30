<?php

namespace App\DataFixtures;

use App\Entity\Race;
use App\Entity\Espece;
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




        $manager->flush();
    }
}
