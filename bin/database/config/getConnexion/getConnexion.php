<?php

namespace Epaphrodite\database\config\getConnexion;

use Epaphrodite\database\config\ini\GetConfig;
use Epaphrodite\database\config\Contracts\DriversConnexion;
use Epaphrodite\database\config\getConnexion\etablishConnexion\mysql;
use Epaphrodite\database\config\getConnexion\etablishConnexion\SqLite;
use Epaphrodite\database\config\getConnexion\etablishConnexion\mongodb;
use Epaphrodite\database\config\getConnexion\etablishConnexion\postgre;
use Epaphrodite\database\config\getConnexion\etablishConnexion\SqlServer;

class getConnexion extends GetConfig implements DriversConnexion
{

    use mysql, postgre, mongodb, SqLite , SqlServer;
}
