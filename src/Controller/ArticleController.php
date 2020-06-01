<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function articles(ArticleRepository $repo)
    {
        $articles = $repo->findAll();
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