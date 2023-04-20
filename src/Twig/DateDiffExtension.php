<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use App\Entity\Player;

class DateDiffExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('date_diff', [$this, 'dateDiff']),
        ];
    }

    public function dateDiff($start, $end = 'now', $absolute = false)
    {
        $startDate = new \DateTime($start);
        $endDate = new \DateTime($end);

        return $startDate->diff($endDate, $absolute);
    }
}