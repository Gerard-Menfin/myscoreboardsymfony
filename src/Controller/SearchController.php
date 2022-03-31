<?php

namespace App\Controller;

use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/recherche", name="app_search")
     */
    public function index(Request $rq, GameRepository $gr): Response
    {
        $word = $rq->query->get("search");
        $jeux = $gr->findBySearch($word);

        /* EXO afficher les resultats dans le fichier search/index.html.twig
                afficher aussi dans une balise h1 : Résultat de la recherche pour ...
                et remplacer les ... par le mot tapé dans la barre de recherche */
        return $this->render('search/index.html.twig', [
            'jeux' => $jeux,
            'mot' => $word
        ]);
    }
}
