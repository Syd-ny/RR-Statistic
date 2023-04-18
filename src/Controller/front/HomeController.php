<?php

namespace App\Controller\front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\QueryBuilder;
use App\Repository\PlayerRepository;

class HomeController extends AbstractController
{

    /**
     * la route par défaut
     *  
     * @Route("/", name="default")
     * @Route("/home", name="home_index")
     * 
     * @return Response
     */
    public function index(PlayerRepository $playerRepository): Response
    {
        
        $allPlayers = $playerRepository->findAllOrderedByLastCreated();
        
        return $this->render("front/home/index.html.twig", [
            'players' => $allPlayers,
        ]);
    }

    /**
     * la route des statistiques des joueurs
     *  
     * @Route("/stats", name="stats_players")
     * 
     * @return Response
     */
    public function stats(PlayerRepository $playerRepository): Response
    {
        $allPlayers = $playerRepository->findAllOrderedByName();
        
        return $this->render("front/stats/players.html.twig",[
            'players' => $allPlayers,
        ]);
    }

    

}
