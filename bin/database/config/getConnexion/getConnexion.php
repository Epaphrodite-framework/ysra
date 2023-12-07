<?php

namespace Epaphrodite\database\config\getConnexion;

use Epaphrodite\database\config\ini\GetConfig;
use Epaphrodite\database\config\Contracts\DriversConnexion;
use Epaphrodite\database\config\getConnexion\etablishConnexion\mysql;
use Epaphrodite\database\config\getConnexion\etablishConnexion\SqLite;
use Epaphrodite\database\config\getConnexion\etablishConnexion\mongodb;
use Epaphrodite\database\config\getConnexion\etablishConnexion\SqlServer;
use Epaphrodite\database\config\getConnexion\etablishConnexion\postgreSQL;

class getConnexion extends GetConfig implements DriversConnexion
{

    use mysql, postgreSQL, mongodb, SqLite , SqlServer;
}
