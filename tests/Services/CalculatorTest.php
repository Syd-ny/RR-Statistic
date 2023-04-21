<?php

namespace App\Tests\Service;

use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * chaque méthode préfixée par "test" sera exécuté par bin/phpunit
     */
    public function testAdd(): void
    {
        // on instancie la classe Calculator
        $calculator = new Calculator();

        // on effectue un calcul avec la méthode à tester et on stocke son résultat
        $result = $calculator->add(3, 3);

        // on vérifie que c'est correct
        $this->assertEquals(5, $result);
    }
}
