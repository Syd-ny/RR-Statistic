<?php

namespace App\Controller\front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlayerRepository;

class PalmaresController extends AbstractController
{

    /**
     * la route des palmares en simple des joueurs
     *  
     * @Route("/palmares/single", name="palmares_single")
     * 
     * @return Response
     */
    public function palmaresSingle(PlayerRepository $playerRepository): Response
    {
        $allPlayers = $playerRepository->findAll();
        
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
    public function palmaresDouble(PlayerRepository $playerRepository): Response
    {
        $allPlayers = $playerRepository->findAll();
        
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
    public function palmaresGlobal(PlayerRepository $playerRepository): Response
    {
        $allPlayers = $playerRepository->findAll();
        
        return $this->render("front/palmares/global.html.twig",[
            'players' => $allPlayers,
        ]);
    }

}
