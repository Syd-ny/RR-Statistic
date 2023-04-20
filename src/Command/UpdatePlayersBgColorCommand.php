<?php
// src/Command/UpdatePlayersBgColorCommand.php

namespace App\Command;

use App\Service\PlayerBgColorService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\Player;

class UpdatePlayersBgColorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:update-players-bg-color';

    private $bgColorService;

    public function __construct(PlayerBgColorService $bgColorService)
    {
        $this->bgColorService = $bgColorService;

        parent::__construct();
    }

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // call the updatePlayersBgColor method of the service
        $this->bgColorService->updatePlayersBgColor();

        $output->writeln('Players background color updated successfully.');

        return Command::SUCCESS;
    }
}
