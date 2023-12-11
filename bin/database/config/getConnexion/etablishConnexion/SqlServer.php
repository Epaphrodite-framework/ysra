<?php

namespace Epaphrodite\database\config\getConnexion\etablishConnexion;

use PDO;
use PDOException;

trait SqlServer{
    
    /**
     * Connexion Sql Serveur
    */
    private function setSqlServerConnexion(int $db)
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

    private function setSqlServerConnexionWithoutDatabase(string $dbName , int $db)
    {

        // Try to connect to database to etablish connexion
        try {

            $serveur = "127.0.0.1";
            $port = "1433";
            $base_de_donnees = "nom_de_la_base";
            $utilisateur = "sa";
            $mot_de_passe = "root";

            var_dump($serveur);die;
            $connexion = new PDO("sqlsrv:Server=$serveur,$port;", $utilisateur, $mot_de_passe);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete = "CREATE DATABASE MaNouvelleBase";
            $connexion->exec($requete);

            

            // Requête pour créer une base de données
            $connexion->exec($requete);

           

           /**$etablishConnexion = new PDO(
                "sqlsrv:Server=" . static::DB_HOST($db) . ';' . static::DB_PORT($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::sqlServerOption()
            );*/

            

           // $etablishConnexion->exec( "CREATE DATABASE {$dbName}" );

            return true;
            
            // If impossible send error message        
        } catch (PDOException $e) {

            return false;
        }
    }  
    
    public function SqlServer(int $db){

        return $this->setSqlServerConnexion($db);
    }  
    
    public function etablishSqlServer(string $dbName , int $db ){

        return $this->setSqlServerConnexionWithoutDatabase($dbName , $db);
    }      

}