<?php

namespace bin\database\config\getConnexion;

use PDO;
use PDOException;
use bin\database\config\ini\GetConfig;
use bin\database\config\Contracts\DriversConnexion;

class getConnexion extends GetConfig implements DriversConnexion
{

    public $connection;

    /**
     * Connexion Sql Serveur
    */
    public function SqlServer(int $db)
    {

        // Try to connect to database to etablish connexion
        try {
            return new PDO(
                "sqlsrv:Server=" . static::DB_HOST($db) . "," . static::DB_PORT($db) . ";Database=" . static::DB_DATABASE($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::SqlserverOPTION
            );

            // If impossible send error message        
        } catch (PDOException $e) {

            $this->getError($e->getMessage());
        }
    }

    /**
     * Connexion Mysql
    */
    public function Mysql(int $db)
    {
        // Try to connect to database to etablish connexion
        try {

            return new PDO(
                "mysql:" . static::DB_HOST($db) . ';' . static::DB_PORT($db) . 'dbname=' . static::DB_DATABASE($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::OPTIONS
            );

            // If impossible send error message        
        } catch (PDOException $e) {
           
            $this->getError($e->getMessage());
        }
    }

    /**
     * Connexion PostgreSQL
    */
    public function PostgreSQL(int $db)
    {

        // Try to connect to database to etablish connexion
        try {

            return new PDO(
                "pgsql:" . static::DB_HOST($db) . ';' . static::DB_PORT($db) . "dbname=" . static::DB_DATABASE($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::OPTIONS
            );

            // If impossible send error message        
        } catch (PDOException $e) {

            $this->getError($e->getMessage());
        }
    }

    /**
     * Connexion PostgreSQL
    */
    public function SqlLite(int $db)
    {

        // Try to connect to database to etablish connexion
        try {
            return new PDO(
                'sqlite:' . static::DB_SQLITE($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::SqliteOPTION
            );

        // If impossible send error message    
        } catch (PDOException $e) {

            static::getError($e->getMessage());
        }
    }

    /**
     * Connexion MongoDB
    */
    public function MongoDB(int $db)
    {

        $param = [
            "username" => static::DB_USER($db),
            "password" => static::DB_PASSWORD($db)
        ];

        $options = empty(static::DB_USER($db))&&empty(static::DB_PASSWORD($db)) ? [] : $param;

        // Try to connect to database to etablish connexion
        try {
            $this->connection = new \MongoDB\Client("mongodb://".static::noDB_HOST($db).":".static::noDB_PORT($db),$options);
            return $this->connection->selectDatabase(static::DB_DATABASE($db));

        // If impossible send error message      
        } catch (\Exception $e) {
            throw static::getError($e->getMessage());
        }
    }  
}
