<?php

namespace bin\database\config\ini;

use bin\controllers\render\errors;
use PDO;

class GetConfig extends errors
{

    /**
     * @var array
    */    
    protected const SqlserverOPTION =
    [
        //PDO::SQLSRV_TXN_READ_UNCOMMITTED, 
        //PDO::SQLSRV_TXN_READ_COMMITTED, 
        //PDO::SQLSRV_TXN_REPEATABLE_READ, 
       // PDO::SQLSRV_TXN_SNAPSHOT, 
       // PDO::SQLSRV_TXN_SERIALIZABLE
    ];

    /**
     * @var array
     */
    protected const OPTIONS =
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES  => false,
        PDO::ATTR_PERSISTENT => true
    ];

    /**
     * @var array
    */
    protected const SqliteOPTION =
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    /**
     * @var string
     * @return string|bool
     */
    private static function ConfigIniContent()
    {
        $ini = _DIR_CONFIG_INI_ . "Config.ini";
        $content = parse_ini_file($ini, true);

        return $content;
    }    

    /**
     * @var string
     * @return string
     */
    protected static function DB_PORT($db):string
    {

        $Port = static::ConfigIniContent()[$db . "DB_PORT"];

        return empty($Port) ? : 'port='.$Port.';';
    } 

    /**
     * @var string
     * @return string
     */
    protected static function noDB_PORT($db):string
    {

        $Port = static::ConfigIniContent()[$db . "DB_PORT"];

        return empty($Port) ? : $Port;
    }     
    
     /**
     * @var string
     * @return string
     */
    protected static function DB_MysqlPORT($db):string
    {

        $Port = static::ConfigIniContent()[$db . "DB_PORT"];

        return empty($Port) ? : 'port='.$Port;
    }       

    /**
     * @var string
     * @return string
     */
    protected static function DB_PASSWORD($db):string
    {

        return static::ConfigIniContent()[$db . "DB_PASSWORD"];
    }

    /**
     * @var string
     * @return string
     */
    protected static function DB_DRIVER($db):string
    {

        return static::ConfigIniContent()[$db . "DB_DIVER"];
    }    

    /**
     * @var string
     * @return string
     */
    protected static function DB_USER($db):string
    {

        return static::ConfigIniContent()[$db . "DB_USER"];
    }

    /**
     * @var string
     * @return string
     */
    protected static function DB_DATABASE($db):string
    {

        return static::ConfigIniContent()[$db . "DB_DATABASE"];
    }  
    
    /**
     * @var string
     * @return string
     */
    protected static function DB_SQLITE($db):string
    {

        return static::ConfigIniContent()[$db . "DB_SQL_LITE_PATH"];
    } 
    
    /**
     * @var string
     * @return bool
     */
    protected static function DB_SOCKET($db):bool
    {

        return static::ConfigIniContent()[$db . "DB_SOCKET"];
    }    
    
    /**
     * @var string
     * @return string
     */
    protected static function DB_HOST($db)
    {
       
        return static::DB_SOCKET($db) === false ? 'host='.static::ConfigIniContent()[$db . "DB_HOST"] : static::ConfigIniContent()[$db . "DB_SOCKET_PATH"];
    }    

    /**
     * @var string
     * @return string
     */
    protected static function noDB_HOST($db)
    {
       
        return static::DB_SOCKET($db) === false ? static::ConfigIniContent()[$db . "DB_HOST"] : static::ConfigIniContent()[$db . "DB_SOCKET_PATH"];
    }     

    /**
     * Error message
     * @param string|null $type
     * 
     * @return mixed
     */
    protected function getError(?string $type = null)
    {

        $this->error_500($type);
    }

}