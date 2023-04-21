<?php

namespace App\Controller\front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PlayerPaginationService;
use App\Repository\PlayerRepository;

class RatingController extends AbstractController
{

    /**
     * la route des ratings en simple des joueurs
     *  
     * @Route("/ratings/single", name="ratings_single")
     * 
     * @return Response
     */
    public function ratingSingle(PlayerPaginationService $paginationService,Request $request ): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedBySingleRating($request, 'desc');
        
        return $this->render("front/ratings/single.html.twig",[
            'players' => $allPlayers,
        ]);
    }

    /**
     * la route des ratings en double des joueurs
     *  
     * @Route("/ratings/double", name="ratings_double")
     * 
     * @return Response
     */
    public function ratingDouble(PlayerPaginationService $paginationService,Request $request): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedByDoubleRating($request);
        
        return $this->render("front/ratings/double.html.twig",[
            'players' => $allPlayers,
        ]);
    }

}
