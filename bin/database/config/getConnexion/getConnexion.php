<?php

namespace epaphrodite\database\config\getConnexion;

use PDO;
use PDOException;
use epaphrodite\database\config\ini\GetConfig;
use epaphrodite\database\config\Contracts\DriversConnexion;
use epaphrodite\database\config\getConnexion\etablishConnexion\mysql;
use epaphrodite\database\config\getConnexion\etablishConnexion\mongodb;
use epaphrodite\database\config\getConnexion\etablishConnexion\postgre;
use epaphrodite\database\config\getConnexion\etablishConnexion\SqlLite;
use epaphrodite\database\config\getConnexion\etablishConnexion\SqlServer;

class getConnexion extends GetConfig implements DriversConnexion
{

    use mysql, postgre, mongodb, SqlLite , SqlServer;

}
