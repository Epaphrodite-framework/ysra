<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use bin\epaphrodite\Kernel\runKernel;

class RunKernelTest extends TestCase
{
    public function testGetSomeValueReturnsExpectedValue()
    {
        require_once 'bin/epaphrodite/define/config/SetDirectory.php';

        // Crée une instance de la classe runKernel
        $runKernel = new runKernel();

        // Appelle la méthode Run pour exécuter le code pertinent
        runKernel::Run();

        // Récupère la valeur retournée par getSomeValue()
        $actualValue = $runKernel->getHome();

        // Définit la valeur attendue ici (selon la logique de votre application)
        $expectedValue = 'views/index/'; // Remplacez ceci par la valeur attendue

        // Effectue une assertion pour vérifier si la valeur retournée est égale à la valeur attendue
        $this->assertEquals($expectedValue, $actualValue);
    }
}

