<?php

namespace App\Controller;

use App\Entity\RechercheAnimal;
use App\Form\RechercheAnimalType;
use App\Repository\AnimalRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/animaux", name="admin_animaux")
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
}
