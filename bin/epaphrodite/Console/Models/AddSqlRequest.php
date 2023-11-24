<?php

namespace epaphrodite\epaphrodite\Console\Models;

use epaphrodite\epaphrodite\Console\Stubs\AddSqlRequestStub;
use Symfony\Component\Console\Input\InputInterface;
use epaphrodite\epaphrodite\Console\Setting\OutputDirectory;
use Symfony\Component\Console\Output\OutputInterface;
use epaphrodite\epaphrodite\Console\Setting\AddSqlConfig;

class AddSqlRequest extends AddSqlConfig
{

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
    */
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        # Get console arguments
        $directory = $input->getArgument('directory');
        $type = $input->getArgument('typeRequest');
        $file = $input->getArgument('fileLocate');
        $name = $input->getArgument('functionName');

        if(!empty(OutputDirectory::Files($directory))){

            $FileName = OutputDirectory::Files($directory) . '/' . $file . '.php';
           
            if(file_exists($FileName)===true){
                AddSqlRequestStub::generate($FileName, $name , $type);
                $output->writeln("<info>Your request {$file} has been created successfully!!!✅</info>");
                return self::SUCCESS;
            }else{
                $output->writeln("<error>Sorry this file {$file} don't exist in {$directory} directory❌</error>");
                return self::FAILURE;  
            }
        }else{
            $output->writeln("<error>Sorry {$directory} directory don't exist❌</error>");
            return self::FAILURE;
        }
    }
}