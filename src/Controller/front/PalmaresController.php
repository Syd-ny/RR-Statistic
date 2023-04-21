<?php

namespace App\Controller\front;

use App\Repository\PlayerRepository;
use App\Service\PlayerPaginationService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PalmaresController extends AbstractController
{
    
    private string $sortDirection = 'desc';

    /**
     * la route des palmares en simple des joueurs
     *  
     * @Route("/palmares/single", name="palmares_single")
     * 
     * @return Response
     */
    public function palmaresSingle(PlayerPaginationService $paginationService,Request $request): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedBySingleLegacy($request, $this->sortDirection);
        
        return $this->render("front/palmares/single.html.twig",[
            'players' => $allPlayers,
        ]);
    }

    /**
     * la route des palmares en double des joueurs
     *  
     * @Route("/palmares/double", name="palmares_double")
     * 
     * @return Response
     */
    public function palmaresDouble(PlayerPaginationService $paginationService,Request $request): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedByDoubleLegacy($request, $this->sortDirection);
        
        return $this->render("front/palmares/double.html.twig",[
            'players' => $allPlayers,
        ]);
    }

    /**
     * la route des palmares global des joueurs
     *  
     * @Route("/palmares/global", name="palmares_global")
     * 
     * @return Response
     */
    public function palmaresGlobal(PlayerPaginationService $paginationService,Request $request): Response
    {
        $allPlayers = $paginationService->getPlayersOrderedByGlobalLegacy($request, $this->sortDirection);
        
        return $this->render("front/palmares/global.html.twig",[
            'players' => $allPlayers,
        ]);
    }

}
