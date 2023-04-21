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

    public function getPlayersOrderedByOldestUpdated(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByOldestUpdated();

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

        return $this->getPlayersWithRank($request, $sortPlayers, $limit, $startingRank);
    }

    public function getPlayersOrderedByDoubleRating(Request $request, string $sortDirection, int $limit = 10, int $startingRank = 1)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByDoublesRating($sortDirection);

        return $this->getPlayersWithRank($request, $sortPlayers, $limit, $startingRank);
    }

    public function getPlayersOrderedBySingleLegacy(Request $request, string $sortDirection, int $limit = 10, int $startingRank = 1)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedBySingleLegacyScore($sortDirection);

        return $this->getPlayersWithRank($request, $sortPlayers, $limit, $startingRank);
    }

    public function getPlayersOrderedByDoubleLegacy(Request $request, string $sortDirection, int $limit = 10, int $startingRank = 1)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByDoublesLegacyScore($sortDirection);

        return $this->getPlayersWithRank($request, $sortPlayers, $limit, $startingRank);
    }

    public function getPlayersOrderedByGlobalLegacy(Request $request, string $sortDirection, int $limit = 10, int $startingRank = 1)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByGlobalLegacyScore($sortDirection);

        return $this->getPlayersWithRank($request, $sortPlayers, $limit, $startingRank);
    }

    private function getPlayersWithRank(Request $request, $sortPlayers, $limit, $startingRank)
    {
        $currentPage = $request->query->getInt('page', 1);
        if($currentPage > 1) {
            $offset = 0;
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
}
