<?php

namespace App\Service;

use App\Repository\PlayerRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class PlayerPaginationService
{
    private $playerRepository;
    private $paginator;

    public function __construct(PlayerRepository $playerRepository, PaginatorInterface $paginator)
    {
        $this->playerRepository = $playerRepository;
        $this->paginator = $paginator;
    }

    public function getPlayersOrderedByLastCreated(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByLastCreated();

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
            $limit
        );
    }

    public function getPlayersOrderedByName(Request $request, int $limit = 10, string $sortDirection ='asc')
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByName($sortDirection);

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
            $limit
        );
    }

    public function getPlayersOrderedBySingleRating(Request $request, string $sortDirection, int $limit = 10, int $startingRank = 1)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedBySingleRating($sortDirection);

        $currentPage = $request->query->getInt('page', 1);
        if($currentPage > 1) {
            $offset = ($currentPage - 1) * $limit - 10;
        } else {
        $offset = ($currentPage - 1) * $limit;
        }
        $startingRank = $offset + 1;

        // Assign ranks to players
        foreach ($sortPlayers as $player) {
            $player->setRank($startingRank++);
        }

        return $this->paginator->paginate(
            $sortPlayers,
            $currentPage,
            $limit
        );
    }

    public function getPlayersOrderedByDoubleRating(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByDoublesRating();

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
            $limit
        );
    }

    public function getPlayersOrderedBySingleLegacy(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedBySingleLegacyScore();

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
            $limit
        );
    }

    public function getPlayersOrderedByDoubleLegacy(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByDoublesLegacyScore();

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
            $limit
        );
    }

    public function getPlayersOrderedByGlobalLegacy(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByGlobalLegacyScore();

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
            $limit
        );
    }
}
