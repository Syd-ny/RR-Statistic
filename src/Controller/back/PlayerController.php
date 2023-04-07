<?php
namespace App\Controller\back;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PlayerType;
use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;


class PlayerController extends AbstractController
{

    

    /**
     * Le formulaire de création d'un joueur
     * 
     * @Route("/player/new", name="player_new", methods={"GET","POST"})
     */
    public function new( Request $request, EntityManagerInterface $entityManager)
    {

        $player = new Player();
        $form = $this->createForm(PlayerType::class,$player);
        
        $form->handleRequest($request);
        
        

        if ($form->isSubmitted() && $form->isValid()) {
            $player->setCreatedAt(new DateTime());

            $entityManager->persist($player);
            $entityManager->flush();
        
            return $this->redirectToRoute('stats_index', ['id' => $player->getId()]);
       
        }

        return $this->render('back/player/new.html.twig', [
            'player'=> $player,
            'form' => $form->createView(),
        ]);
    }
}
