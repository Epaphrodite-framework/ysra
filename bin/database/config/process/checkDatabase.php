<?php

namespace epaphrodite\database\config\process;

use epaphrodite\database\config\getConnexion\getConnexion;
use epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\InitSeederGenerated;
use epaphrodite\database\requests\typeRequest\noSqlRequest\insert\AutoMigrations\InitNoSeederGenerated;

class checkDatabase extends getConnexion
{

    protected function dbConnect(?int $db = 1)
    {

        // Switch based on the database driver type
        switch (static::DB_DRIVER($db)) {
                // If the driver is MySQL, connect to MySQL using the Mysql method
            case 'mysql':
                return $this->Mysql($db);
                break;

                // If the driver is PostgreSQL, connect to PostgreSQL using the PostgreSQL method
            case 'pgsql':
                return $this->PostgreSQL($db);
                break;

                // If the driver is MongoDB, connect to MongoDB using the MongoDB method
            case 'mongodb':
                return $this->MongoDB($db);
                break;

            default:
                throw new \InvalidArgumentException("Unsupported database driver");
        }
    }

    public function etablishConnect(string $dbName = NULL, int $db)
    {

        // Switch based on the database driver type
        switch (static::DB_DRIVER($db)) {
                // If the driver is MySQL, connect to MySQL using the Mysql method
            case 'mysql':
                return $this->etablishMysql($dbName, $db);
                break;

                // If the driver is PostgreSQL, connect to PostgreSQL using the PostgreSQL method
            case 'pgsql':
                return $this->etablishPostgreSQL($dbName, $db);
                break;

                // If the driver is MongoDB, connect to MongoDB using the MongoDB method
            case 'mongodb':
                return $this->etablishMongoDB($dbName, $db);
                break;

            default:
                throw new \InvalidArgumentException("Unsupported database driver");
        }
    }

    public function SeederGenerated(?int $db = 1)
    {
        // Switch based on the database driver type
        switch (static::DB_DRIVER($db)) {
                // If the driver is MySQL, create the table using InitSeederGenerated
            case 'mysql':
                return (new InitSeederGenerated)->CreateTableMysql();
                break;

                // If the driver is PostgreSQL, create the table using InitSeederGenerated
            case 'pgsql':
                return (new InitSeederGenerated)->CreateTablePostgreSQL();
                break;

                // If the driver is MongoDB, create collections using InitNoSeederGenerated
            case 'mongodb':
                return (new InitNoSeederGenerated)->CreateMongoCollections();
                break;

            default:
                throw new \InvalidArgumentException("Unsupported database driver");
        }
    }
}
