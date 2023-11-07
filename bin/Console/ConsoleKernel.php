<?php

namespace bin\Console;

class ConsoleKernel
{

    /**
     * Console commades list
     * @return array
    */
    public function GetConsolesCommands():array
    {
        return [
            new \bin\epaphrodite\Console\commands\CommandsUsers,
            new \bin\epaphrodite\Console\commands\CommandRunServer,
            new \bin\epaphrodite\Console\commands\CommandAddRights,
            new \bin\epaphrodite\Console\commands\CommandAddModules,
            new \bin\epaphrodite\Console\commands\CommandCreatFront,
            new \bin\epaphrodite\Console\commands\CommandController,
            new \bin\epaphrodite\Console\commands\CommandUpdateUser,
            new \bin\epaphrodite\Console\commands\CommandRequestFiles,
            new \bin\epaphrodite\Console\commands\CommandAddSqlRequest,
            new \bin\epaphrodite\Console\commands\CommandAddNoSqlRequest,
            new \bin\epaphrodite\Console\commands\CommandAddControllerFunction,
        ];
    }    
}