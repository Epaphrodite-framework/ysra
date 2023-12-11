<?php

namespace Epaphrodite\database\config\getConnexion\etablishConnexion;

use PDO;

trait CassandraDB
{

    // Establishes a connection to Cassandra database with provided credentials
    private function connectToCassandra(int $db): ?PDO
    {
        try {
            // Creating a PDO instance to connect to Cassandra database
            return new PDO(
                'cassandra:' . static::DB_HOST($db) . ';' . static::DB_PORT($db) . ';dbname=' . static::DB_DATABASE($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::cassandraOptions()
            );
        } catch (\PDOException $e) {
            // Handling any connection errors that might occur and returning null in case of failure
            $this->getError($e->getMessage());
            return null; // Return null in case of connection failure
        }
    }

    // Establishes a Cassandra connection without specifying a database
    private function setCassandraConnexionWithoutDatabase(string $dbName, int $db): ?PDO
    {
        try {
            // Creating a PDO instance to connect to Cassandra without specifying a database
            return new PDO(
                'cassandra:' . static::DB_PORT($db) . ';dbname=' . static::DB_DATABASE($db),
                static::DB_USER($db),
                static::DB_PASSWORD($db),
                static::cassandraOptions()
            );
        } catch (\PDOException $e) {
            // Handling any connection errors that might occur and returning null in case of failure
            $this->getError($e->getMessage());
            return null; // Return null in case of connection failure
        }
    }

    // Public function to establish a Cassandra database connection
    public function cassandraDB(int $db): ?PDO
    {
        // Calls the private method to establish a connection to Cassandra
        return $this->connectToCassandra($db);
    }

    // Public function to establish a Cassandra connection without specifying a database
    public function etablishCassandra(string $dbName, int $db): ?PDO
    {
        // Calls the private method to establish a Cassandra connection without specifying a database
        return $this->setCassandraConnexionWithoutDatabase($dbName, $db);
    }
}
