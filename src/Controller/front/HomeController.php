<?php

namespace App\Controller\front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\QueryBuilder;
use App\Repository\PlayerRepository;
use App\Service\PlayerPaginationService;
use Knp\Component\Pager\PaginatorInterface;

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
    public function index(PlayerPaginationService $paginationService,Request $request): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedByLastCreated($request);
        
        return $this->render("front/home/index.html.twig", [
            'players' => $allPlayers,
        ]);
    }

    /**
     * la route des joueurs les plus anciennement mis a jour
     *  
     * @Route("/to_update", name="to_update")
     * 
     * @return Response
     */
    public function toUpdate(PlayerPaginationService $paginationService,Request $request): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedByOldestUpdated($request);
        
        return $this->render("front/home/toUpdate.html.twig", [
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
    public function stats(PlayerPaginationService $paginationService,Request $request): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedByName($request);
        
        return $this->render("front/stats/players.html.twig",[
            'players' => $allPlayers,
        ]);
    }

    

}
