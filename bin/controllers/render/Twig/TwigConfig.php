<?php

namespace bin\controllers\render\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use bin\epaphrodite\env\config\ResponseSequence;
use bin\epaphrodite\define\config\traits\currentFunctionNamespaces;
use bin\epaphrodite\define\config\traits\currentVariableNameSpaces;

class TwigConfig extends ResponseSequence{

    use currentVariableNameSpaces , currentFunctionNamespaces;

    /**
     * Twig path Environment
     * @var \Twig\Environment $TwigEnvironment
     * @return mixed
    */    
    protected function TwigEnvironment()
    {

        $TwigEnvironment = new Environment ( (new FilesystemLoader ( _DIR_VIEWS_ ) ) , [ 'cache' =>false ]);
        
        $TwigEnvironment->addExtension(new static::$initTwigConfig['extension']);

        return $TwigEnvironment;
    }

}