<?php

namespace bin\database\config\process;

use bin\database\config\getConnexion\getConnexion;
use bin\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\InitSeederGenerated;
use bin\database\requests\typeRequest\noSqlRequest\insert\AutoMigrations\InitNoSeederGenerated;

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
        }
    }
}
