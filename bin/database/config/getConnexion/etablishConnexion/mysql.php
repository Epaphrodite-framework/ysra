<?php

namespace epaphrodite\database\config\getConnexion\etablishConnexion;

use PDO;
use PDOException;

trait mysql{

    /**
     * Connexion Mysql
     * @param int $db
    */
    private function setMysqlConnexion(int $db)
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
     * Connexion Mysql
     * @param int $db
    */
    private function setMysqlConnexionWithoutDatabase(int $db)
    {

        // Try to connect to database to etablish connexion
        try {

            return new PDO(
                "mysql:" . static::DB_HOST($db) . ';' . static::DB_PORT($db),
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
     * Mysql database connexion
     * @param int $db
     */
    public function Mysql(int $db){

        return $this->setMysqlConnexion($db);
    }

    /**
     * Mysql database connexion
     * @param int $db
     */
    public function etablishMysql(int $db){

        return $this->setMysqlConnexionWithoutDatabase($db);
    }    
}