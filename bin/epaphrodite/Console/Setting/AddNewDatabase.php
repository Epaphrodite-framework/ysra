<?php

namespace epaphrodite\epaphrodite\Console\Setting;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

class AddNewDatabase extends Command
{

    protected function configure()
    {
        $this->setDescription('Add a new database')
             ->setHelp('This command allows you to Add a new Database')
             ->addArgument('datatase', InputArgument::REQUIRED, 'Select database to create');
    }
}