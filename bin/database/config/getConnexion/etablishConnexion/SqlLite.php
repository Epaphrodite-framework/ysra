<?php

namespace epaphrodite\database\config\getConnexion\etablishConnexion;

use PDO;
use PDOException;

trait SqlLite{

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
                static::sqlLiteOptions()
            );

        // If impossible send error message    
        } catch (PDOException $e) {

            static::getError($e->getMessage());
        }
    }     

}