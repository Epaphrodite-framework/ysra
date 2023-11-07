<?php

namespace bin\Console;

interface CommandInterface
{

    /**
     * @param null|array $parameters
    */
    public function execute(?array $parameters = []);
}