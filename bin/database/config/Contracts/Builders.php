<?php

namespace bin\database\config\Contracts;

interface Builders
{

    /**
    * @return process
    */    
    public static function process();

    /**
     * @return checkDbType
     */      
    public function checkDbType();

    /**
     * @return firstSeederGeneration
     */    
    public static function firstSeederGeneration();
}