<?php

namespace App\Controller;

use App\Repository\GameRepository;
use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CommencerPartieType;
use App\Entity\Contest;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(GameRepository $gr, PlayerRepository $pr): Response
    {

        return $this->render('home/index.html.twig', [
            "jeux"       => $gr->findAll(),
            "nb_joueurs" => count($pr->findAll()),
            "gagnants"   => $pr->findWinners()
        ]);
    }

    /**
     * @Route("/commencer-une-partie-de-{title}", name="app_home_contest")
     */
    public function commencer(Game $jeu, EntityManagerInterface $em, Request $rq)
    {
        $partie = new Contest;
        $partie->setGame($jeu);
        $form = $this->createForm(CommencerPartieType::class, $partie);
        $form->handleRequest($rq);
        if( $form->isSubmitted() && $form->isValid() ){
            // $em = $this->getDoctrine()->getManager();
            $em->persist($partie);
            $em->flush();
            $this->addFlash("success", "La nouvelle partie a bien été enregistrée");
            // $this->addFlash("success", "succès");
            // $this->addFlash("danger", "Message d'erreur");
            // $this->addFlash("info", "Message d'info");
            return $this->redirectToRoute("app_home");
        }
        return $this->render("home/commencer.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
