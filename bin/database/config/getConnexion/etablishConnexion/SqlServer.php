<?php

namespace epaphrodite\database\config\getConnexion\etablishConnexion;

use PDO;
use PDOException;

trait SqlServer{
    
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
                static::sqlServerOption()
            );

            // If impossible send error message        
        } catch (PDOException $e) {

            $this->getError($e->getMessage());
        }
    }

}