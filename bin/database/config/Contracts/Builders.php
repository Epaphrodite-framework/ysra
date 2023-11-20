<?php

namespace bin\database\config\Contracts;

interface Builders
{
    /**
     * @return mixed
     */
    public function checkDbType();

    /**
     *@return mixed
     */
    public static function firstSeederGeneration();
}
