<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    /**
     * @Route("/test-route", name="app_test")
     */
    #[Route('/test', name:'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'Bonjour',
            'texte' => "le texte que je veux afficher"
        ]);
    }

    /* EXERCICES 
    Ajouter une route pour le chemin "/test/calcul"
    qui utilise le fichier test/index.html.twig
    et qui affiche le resultat de 12 + 7
    */

    /**
     * @Route("/test/calcul")
     */
    #[Route('/test/calcul')]
    public function calcul()
    {
        $a = 12;
        $b = 7;
        return $this->render("test/index.html.twig", [
            "controller_name" => "Didier",
            "texte" => "Comment ça va ?",
            "calcul" => $a + $b
        ]);
    }

    /**
     * @Route("/test/salut")
     */
    #[Route('/test/salut')]
    public function salut()
    {
        return $this->render("test/salut.html.twig", [ "prenom" => "Didier" ]);
    }

    /**
     * @Route("/test/tableau")
     */
    public function tableau()
    {
        $array = [ "bonjour", "je m'appelle", 789, true, 12, 38 ];
        return $this->render("test/tableau.html.twig", [
            "tableau" => $array
        ]);
    }

    /**
     * @Route("/test/tableau-assoc")
     */
    public function tab()
    {
        $p = [
            "nom" => "Cérien",
            "prenom" => "Jean",
            "age" => 32
        ];

        return $this->render("test/assoc.html.twig", ["personne" => $p ]);
        // EXO : Afficher "Je m'appelle " suivi du prénom et du nom dans 
        //le tableau
    }

    /**
     * @Route("/test/objet")
     */
    public function objet()
    {
        $objet = new \stdClass;
        $objet->prenom = "Nordine";
        $objet->nom = "Ateur";
        $objet->age = 40;
        return $this->render("test/assoc.html.twig", [ "personne" => $objet ]);
    }

    /**
     * @Route("/test/salut/{prenom}")
     */
    public function salutation($prenom): Response
    {
        $phrase = "Bonjour, $prenom, comment ça va ?"; 
        return $this->render("test/salutation.html.twig", [ "phrase" => $phrase ]);
    }
    
    /**
     * @Route("/admin/test/migrations", name="test_migration")
     */
    public function FunctionName(EntityManagerInterface $em)
    {
        $statement = $em->getConnection()->prepare("SELECT * FROM doctrine_migration_versions");
        $resultats = $statement->executeQuery();
        dd($resultats);
        return $this->render("test/migration.html.twig", ["migrations" => $resultats->fetchAll(\Doctrine\DBAL\FetchMode::ASSOCIATIVE)]);
    }
}
