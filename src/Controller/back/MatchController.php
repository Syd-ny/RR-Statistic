<?php
namespace App\Controller\back;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\NewPlayerType;
use App\Form\EditPlayerType;
use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;


class MatchController extends AbstractController
{

    

    /**
     * La page de paramétrage de simulation
     * 
     * @Route("/match/show", name="match_show", methods={"GET","POST"})
     */
    public function show( Request $request, EntityManagerInterface $entityManager)
    {

        $player = new Player();
        $form = $this->createForm(NewPlayerType::class,$player);
        
        $form->handleRequest($request);
        
        

        if ($form->isSubmitted() && $form->isValid()) {
            $player->setCreatedAt(new DateTime());

            $entityManager->persist($player);
            $entityManager->flush();
        
            return $this->redirectToRoute('player_show', ['id' => $player->getId()]);
       
        }

        return $this->renderForm('back/player/new.html.twig', [
            'player'=> $player,
            'form' => $form,
        ]);
    }
}
