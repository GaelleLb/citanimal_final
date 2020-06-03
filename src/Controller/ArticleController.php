<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function articles(ArticleRepository $repo, PaginatorInterface $paginatorInterface, Request $request)
    {
        $articles = $paginatorInterface->paginate(
            $repo->findAllWithPagination(),
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('article/articles.html.twig', [
            'articles' => $articles,
        ]);
    }
    
    /**
     * @Route("/article/{id}", name="article")
     */
    public function article(Article $article, ArticleRepository $repo)
    {
        $articles = $repo->findAll();
        return $this->render('article/article.html.twig', [
            'articles' => $articles,
            'article' => $article,
        ]);
    }
}