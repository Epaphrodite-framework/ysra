<?php

namespace Epaphrodite\database\config\getConnexion\etablishConnexion;

use PDO;
use PDOException;

trait SqLite{

    /**
     * Connexion PostgreSQL
    */
    public function sqLite(int $db)
    {

        // Try to connect to database to etablish connexion
        try {
            return new PDO(
                'sqlite:' . static::DB_SQLITE($db),
                    static::DB_USER($db),
                    static::DB_PASSWORD($db),
                    static::sqLiteOptions()
            );

        // If impossible send error message    
        } catch (PDOException $e) {

            static::getError($e->getMessage());
        }
    }   
}