<?php

namespace epaphrodite\epaphrodite\Console\Models;

use epaphrodite\epaphrodite\Console\Stubs\ControllerStub;
use Symfony\Component\Console\Input\InputInterface;
use epaphrodite\epaphrodite\Console\Setting\OutputDirectory;
use Symfony\Component\Console\Output\OutputInterface;
use epaphrodite\epaphrodite\Console\Setting\ControllersConfig;


class CreateControllers extends ControllersConfig
{
    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $filename = OutputDirectory::Files('controlleur') . '/' . $name . '.php';
        ControllerStub::GenerateControlleurs($filename, $name);
        $output->writeln("<info>The controller {$name} has been successfully created!!!✅</info>");

        return self::SUCCESS;
    }

}