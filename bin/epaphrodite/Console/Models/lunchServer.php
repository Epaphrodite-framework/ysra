<?php

namespace bin\epaphrodite\Console\Models;

use bin\epaphrodite\Console\Setting\AddServerConfig;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class lunchServer extends AddServerConfig
{

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $port = null;
        $host = null;

        $port = $input->getOption('port');
        $host = $input->getOption('host');

        if(!empty($this->portChecking($port))){
            
            $output->writeln("<error>The port {$port} is currently in use.❌</error>");
            return self::FAILURE;
        }else{

            $this->startServer($host, $port);
        }
    }

    /**
     * Start server
     */
    private function startServer($host, $port)
    {
        echo "Starting the server on port $port, host $host...\n";
        exec("php -S $host:$port");
    }

    /**
     * Listen port
     */
    private function portChecking($port){

       $command = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? "netstat -an | findstr $port" : "lsof -i :$port";

       return exec($command);
    }
}
