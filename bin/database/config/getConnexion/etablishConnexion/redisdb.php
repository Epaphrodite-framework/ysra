<?php

namespace Database\Epaphrodite\config\getConnexion\etablishConnexion;

trait redisdb
{

  /**
 * Connexion Redis
 */
private function setRedisDBConnexion(int $db)
{
    $dbPrefix = static::DB_DATABASE($db) . ':';
    $redis = new Redis();

    try {
        // Try to connect to the Redis server
        $connected = $redis->connect(static::noDB_HOST($db), static::noDB_PORT($db));

        if (!$connected) {
            throw static::getError('Failed to connect to Redis server.');
        }

        // Authenticate with the Redis server
        $authenticated = $redis->auth(static::DB_PASSWORD($db));

        if (!$authenticated) {
            throw static::getError('Failed to authenticate with Redis server.');
        }

        // Return the Redis connection
        return $redis;
    } catch (\Exception $e) {
        throw static::getError('Redis Connection Error: ' . $e->getMessage());
    }
}

    public function RedisDB(int $db)
    {

        return $this->setRedisDBConnexion($db);
    }

}
