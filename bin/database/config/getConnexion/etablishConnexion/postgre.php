<?php

namespace epaphrodite\database\config\getConnexion\etablishConnexion;

use PDO;
use PDOException;

trait postgre{

    /**
     * Connexion PostgreSQL
    */
    private function setPostgreSQLConnexion(int $db)
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

    private function setPostgreSQLConnexionWithoutDatabase(int $db)
    {

        // Try to connect to database to etablish connexion
        try {

            return new PDO(
                "pgsql:" . static::DB_HOST($db) . ';' . static::DB_PORT($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::OPTIONS
            );

            // If impossible send error message        
        } catch (PDOException $e) {

            $this->getError($e->getMessage());
        }
    }    
    
    public function PostgreSQL(int $db){

        return $this->setPostgreSQLConnexion($db);
    }  
    
    public function etablishPostgreSQL(int $db){

        return $this->setPostgreSQLConnexionWithoutDatabase($db);
    }    

}