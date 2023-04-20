<?php

// src/Service/PlayerBgColorService.php

namespace App\Service;

use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;

class PlayerBgColorService
{
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function updatePlayersBgColor()
    {
        $players = $this->entityManager->getRepository(Player::class)->findAllOrderedByLastCreated();
        
        foreach ($players as $player) {
            $lastUpdated = $player->getUpdatedAt() ?? $player->getCreatedAt();
            $now = new \DateTime();
            $interval = $now->diff($lastUpdated);
            
            if ($interval->days < 3) {
                $player->setBgColor('bg-success');
            } elseif ($interval->days < 7) {
                $player->setBgColor('bg-warning');
            } else {
                $player->setBgColor('bg-danger');
            }
        }
        
        $this->entityManager->flush();
    }
}
