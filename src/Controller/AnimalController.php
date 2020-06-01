<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();
        return $this->render('animal/index.html.twig', [
            'title' => "Association Citanimal",
            'subtitle' => "association loi 1901 d'information et de protection pour l'animal citoyen",
            'articles' => $articles
        ]);
    }


    /** 
    * @Route("/animaux/", name="animaux") 
    */
    public function animaux(AnimalRepository $repo)
    {
        $animaux = $repo->findAll();
        return $this->render('animal/animaux.html.twig', [
            'animaux' => $animaux
        ]);

    }

}

