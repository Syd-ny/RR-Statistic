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
use App\Service\PlayerBgColorService;
use DateTime;


class PlayerController extends AbstractController
{

    

    /**
     * Le formulaire de création d'un joueur
     * 
     * @Route("/player/new", name="player_new", methods={"GET","POST"})
     */
    public function new( Request $request, EntityManagerInterface $entityManager,PlayerBgColorService $bgColorService)
    {

        $player = new Player();
        $form = $this->createForm(NewPlayerType::class,$player);
        
        $form->handleRequest($request);
        
        

        if ($form->isSubmitted() && $form->isValid()) {
            $player->setCreatedAt(new DateTime());

            $entityManager->persist($player);
            $entityManager->flush();

            $bgColorService->updatePlayersBgColor($player);
        
            return $this->redirectToRoute('player_show', ['id' => $player->getId()]);
       
        }

        return $this->renderForm('back/player/new.html.twig', [
            'player'=> $player,
            'form' => $form,
        ]);
    }

    /**
     * Le formulaire d'édition d'un joueur
     * 
     * @Route("/player/{id}/edit", name="player_edit", methods={"GET","POST"})
     */
    public function edit(Request $request,EntityManagerInterface $entityManager, Player $player,
    PlayerBgColorService $bgColorService)
    {
        $form = $this->createForm(EditPlayerType::class, $player);

        $form->setData($player);

        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()) {
            $player->setUpdatedAt(new DateTime());

            $entityManager->flush();

            $bgColorService->updatePlayersBgColor($player);

            return $this->redirectToRoute('player_show',['id' => $player->getId()]);
        }

        return $this->renderForm('back/player/edit.html.twig', [
            'player' => $player,
            'form' => $form,
        ]);
    }

    /**
     * Page d'affichage des informations d'un joueur spécifique.
     * 
     * @Route("/show/{id}", name="player_show", methods={"GET"})
     */
    public function show($id, PlayerRepository $playerRepository): Response
    {
        $player = $playerRepository->find($id);

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
