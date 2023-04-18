<?php

namespace App\Controller\front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlayerRepository;

class PotentialController extends AbstractController
{
    /**
     * la route des potentiels en simple des joueurs
     *
     * @Route("/potentials/single", name="potential_single")
     *
     * @return Response
     */
    public function potentialSingle(PlayerRepository $playerRepository): Response
    {
        $allPlayers = $playerRepository->findAllOrderedBySingleRating();

        return $this->render("front/potentials/single.html.twig", [
            'players' => $allPlayers,
        ]);
    }
}