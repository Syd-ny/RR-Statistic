<?php

namespace App\Service;

/**
 * Effectue des calculs (pour la démo des tests unitaires)
 */
class Calculator
{
    /**
     * Additionner deux nombres
     * 
     * @param float $a opérande 1
     * @param float $b opérande 2
     * @return float la somme des deux nombres
     */
    public function add(float $a, float $b): float
    {
        return $a + $b;
    }
}