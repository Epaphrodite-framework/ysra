<?php

namespace bin\database\config\process;

use bin\database\config\getConnexion\getConnexion;
use bin\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\InitSeederGenerated;
use bin\database\requests\typeRequest\noSqlRequest\insert\AutoMigrations\InitNoSeederGenerated;

class checkDatabase extends getConnexion
{

    protected function dbConnect(?int $db = 1)
    {
        
        switch ($db) {

            case static::DB_DRIVER($db) === 'mysql':

                return $this->Mysql($db);
                break;

            case static::DB_DRIVER($db) === 'pgsql':

                return $this->PostgreSQL($db);
                break;

            case static::DB_DRIVER($db) === 'mongodb':

                return $this->MongoDB($db);
                break;
        }
    }


    public function SeederGenerated(?int $db = 1)
    {
       
        switch ($db) {
            case static::DB_DRIVER($db) === 'mysql':

                return (new InitSeederGenerated)->CreateTableMysql();
                break;

            case static::DB_DRIVER($db) === 'pgsql':

                return (new InitSeederGenerated)->CreateTablePostgreSQL();
                break;

            case static::DB_DRIVER($db) === 'mongodb':

                return (new InitNoSeederGenerated)->CreateMongoCollections();
                break;
        }
    }
}
