<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;
use App\Entity\RechercheAnimal;
use App\Form\RechercheAnimalType;
use App\Repository\AnimalRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/animaux", name="adminAnimaux")
     */
    public function admin(AnimalRepository $repo, PaginatorInterface $paginatorInterface, Request $request)
    {
        $search = new RechercheAnimal();
        $form = $this->createForm(RechercheAnimalType::class, $search);
        $form->handleRequest($request);

        $animaux = $paginatorInterface->paginate(
            $repo->findAllWithPagination($search),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('admin/admin_animaux.html.twig', [
            'animaux' => $animaux,
            'form' => $form->createView(),
            'admin' => true
        ]);
    }

    /**
     * @Route("/admin/animaux/{id}", name="modifierAnimal")
     */    
    public function modifier(Animal $animal, Request $request, EntityManagerInterface $manager) {

        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($animal);
            $manager->flush();
            return $this->redirectToRoute("adminAnimaux");
        }

        return $this->render('admin/modification.html.twig', [
            'animaux' => $animal,
            'form' => $form->createView(),
        ]);
    }
}
