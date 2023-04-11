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
        
            return $this->redirectToRoute('stats_players', ['id' => $player->getId()]);
       
        }

        return $this->render('back/player/new.html.twig', [
            'player'=> $player,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Page d'affichage des informations d'un joueur spécifique.
     * 
     * @Route("/{id}", name="player_show", methods={"GET"})
     */
    public function show(Player $player = null): Response
    {
        if ($player === null) {
            throw $this->createNotFoundException('Joueur non trouvé.');
        }

        return $this->render('front/home/show.html.twig',[
            'player'=> $player,
        ]);
    }

    /**
     * WIP : Ajouter un article
     * 
     * @Route("/post/add", name="post_add")
     */
    public function add()
    {
        return new Response('@todo : ajouter un article, accès administrateur seulement.</body>');
    }
}
