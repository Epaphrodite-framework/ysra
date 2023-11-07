<?php

declare(strict_types=1);

namespace bin\epaphrodite\Extension\Filters;

use bin\epaphrodite\define\config\traits\currentFunctionNamespaces;
use Twig\Extension\AbstractExtension;

class SetTwigFilters extends AbstractExtension
{

    use currentFunctionNamespaces;

    public function twig_strptad($number, $pad_length, $pad_string)
    {
        return static::initNamespace()['env']->strpad($number, $pad_length, $pad_string);
    }  
    
    /**
     * Transforme code ISO
     * @return string
     */
    public function isoPath_twig($string)
    {

        return static::initNamespace()['env']->chaine($string);
    }
    
    /**
     * Transforme code ISO
     * @return date
     */
    public function LongPath_twig($string)
    {

        return static::initNamespace()['env']->LongDate($string);
    }
}