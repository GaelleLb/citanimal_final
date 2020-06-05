<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\RechercheAnimal;
use App\Form\RechercheAnimalType;
use App\Repository\AnimalRepository;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ArticleRepository $repo, PaginatorInterface $paginatorInterface, Request $request)
    {
        $articles = $paginatorInterface->paginate(
            $repo->findAllWithPagination(),
            $request->query->getInt('page', 1),
            4
        );
        return $this->render('animal/index.html.twig', [
            'title' => "Association Citanimal",
            'subtitle' => "association loi 1901 d'information et de protection pour l'animal citoyen",
            'articles' => $articles
        ]);
    }


    /** 
    * @Route("/animaux/", name="animaux") 
    */
    public function animaux(AnimalRepository $repo, PaginatorInterface $paginatorInterface, Request $request)
    {

        $animaux = $paginatorInterface->paginate(
            $repo->findAllWithPagination(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('animal/animaux.html.twig', [
            'animaux' => $animaux,
        ]);
    }


    /**
     * @Route("animal/{id}", name="animal")
     */
    public function animal(Animal $animal)
    {
        return $this->render('animal/animal.html.twig', [
            'animal' => $animal
        ]);  
    }
}

