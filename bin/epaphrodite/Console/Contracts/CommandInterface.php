<?php

namespace epaphrodite\Console;

interface CommandInterface
{

    /**
     * @param null|array $parameters
    */
    public function execute(?array $parameters = []);
}