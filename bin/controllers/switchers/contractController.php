<?php

namespace bin\controllers\switchers;

interface contractController
{

    /**
     * @param mixed $class
     * @param mixed $pages
     * @return mixed
     */
    public function SwitchApiControllers( $class , $pages );

    /**
     * @param mixed $class
     * @param mixed $pages
     * @param bool $switch
     * @return mixed
     */    
    public function SwitchControllers($class, $pages, ?bool $switch = false);
}