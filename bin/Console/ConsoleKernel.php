<?php

namespace epaphrodite\Console;

class ConsoleKernel
{

    /**
     * Console commades list
     * @return array
    */
    public function GetConsolesCommands():array
    {
        return [
            new \epaphrodite\epaphrodite\Console\commands\CommandsUsers,
            new \epaphrodite\epaphrodite\Console\commands\CommandRunServer,
            new \epaphrodite\epaphrodite\Console\commands\CommandAddRights,
            new \epaphrodite\epaphrodite\Console\commands\CommandAddModules,
            new \epaphrodite\epaphrodite\Console\commands\CommandCreatFront,
            new \epaphrodite\epaphrodite\Console\commands\CommandController,
            new \epaphrodite\epaphrodite\Console\commands\CommandUpdateUser,
            new \epaphrodite\epaphrodite\Console\commands\CommandRequestFiles,
            new \epaphrodite\epaphrodite\Console\commands\CommandAddSqlRequest,
            new \epaphrodite\epaphrodite\Console\commands\CommandAddNoSqlRequest,
            new \epaphrodite\epaphrodite\Console\commands\CommandAddControllerFunction,
        ];
    }    
}