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

    public function getPlayersOrderedByName(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedByName();

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
            $limit
        );
    }

    public function getPlayersOrderedBySingleRating(Request $request, int $limit = 10)
    {
        $sortPlayers = $this->playerRepository->findAllOrderedBySingleRating();

        return $this->paginator->paginate(
            $sortPlayers,
            $request->query->getInt('page', 1),
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
