<?php

namespace bin\database\requests\typeRequest\sqlRequest\insert\AutoMigrations;

use bin\database\query\Builders;
use bin\epaphrodite\danho\GuardPassword;

class InitSeederGenerated extends Builders
{

  protected $Guard;

  public function __construct()
  {
    $this->Guard = new GuardPassword;
  }

  /**
   * Create recently users actions if not exist
   */
  private function createRecentlyActionsIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS recentactions (idrecentactions int(11) NOT NULL auto_increment , usersactions varchar(20)NOT NULL , dateactions datetime , libactions varchar(300)NOT NULL , PRIMARY KEY(idrecentactions) , INDEX (usersactions) )";

    static::process()->insert($sql, NULL, false);
  }

  /**
   * Create auth_secure if not exist
   */
  private function CreateAuthSecureIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS authsecure (idtokensecure int(11) NOT NULL auto_increment , crsfauth varchar(300)NOT NULL , authkey varchar(200) NOT NULL , createat datetime , PRIMARY KEY(idtokensecure) , INDEX (crsfauth) )";

    static::process()->insert($sql, NULL, false);
  }

  /**
   * Create messages if not exist
   */
  private function CreateChatMessagesIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS chatsmessages (idchatsmessages int(11) NOT NULL auto_increment , emetteur varchar(20)NOT NULL , destinataire varchar(20) NOT NULL , typemessages int(1) NOT NULL , contentmessages varchar(500) NOT NULL , datemessages datetime , etatmessages int(1) NOT NULL , PRIMARY KEY(idchatsMessages) , INDEX (emetteur) , INDEX (destinataire) )";

    static::process()->insert($sql, NULL, false);
  }

  /**
   * Create user if not exist
   */
  private function CreateUserIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS useraccount (idusers int(11) NOT NULL auto_increment , loginusers varchar(20)NOT NULL , userspwd varchar(100) NOT NULL , nomprenomsusers varchar(150) DEFAULT NULL , contactusers varchar(10) DEFAULT NULL , emailusers varchar(50) DEFAULT NULL , typeusers int(1) NOT NULL DEFAULT '1' , usersstat int(1) NOT NULL DEFAULT '1' , PRIMARY KEY(idUsers) , INDEX (loginusers) )";

    static::process()->insert($sql, NULL, false);

  }

  /**
   * Create user if not exist
   */
  private function CreatePostgeSQLUserIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS 
            useraccount (idusers SERIAL PRIMARY KEY, 
            loginusers varchar(20) NOT NULL , 
            userspwd varchar(100) NOT NULL , 
            nomprenomsusers varchar(150) DEFAULT NULL , 
            contactusers varchar(10) DEFAULT NULL , 
            emailusers varchar(50) DEFAULT NULL , 
            typeusers INT NOT NULL DEFAULT 1 , 
            usersstat INT NOT NULL DEFAULT 1)";

    $sqlIndex = "CREATE INDEX 
                  loginusers ON useraccount (loginusers)";

    static::process()->insert($sql, NULL, false);              
    static::process()->insert($sqlIndex, NULL, false);

  }

  /**
   * Create recently users actions if not exist
   */
  private function createRecentlyActionsPostgeSQLIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS 
            recentactions (idrecentactions SERIAL PRIMARY KEY , 
            usersactions varchar(20)NOT NULL , 
            dateactions TIMESTAMP , 
            libactions varchar(300)NOT NULL )";

    $sqlIndex = "CREATE INDEX 
                  usersactions ON recentactions (usersactions)";

    static::process()->insert($sql, NULL, false);
    static::process()->insert($sqlIndex, NULL, false);
  }

  /**
   * Create auth_secure if not exist
   */
  private function CreateAuthSecurePostgeSQLIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS 
            authsecure (idtokensecure SERIAL PRIMARY KEY , 
            crsfauth varchar(300)NOT NULL , 
            authkey varchar(200) NOT NULL , 
            createat TIMESTAMP )";

    $sqlIndex = "CREATE INDEX 
                  crsfauth ON authsecure (crsfauth)";

    static::process()->insert($sql, NULL, false);
    static::process()->insert($sqlIndex, NULL, false);

  }

  /**
   * Create messages if not exist
   */
  private function CreateChatMessagesPostgeSQLIfNotExist()
  {

    $sql = "CREATE TABLE IF NOT EXISTS 
            chatsmessages (idchatsmessages SERIAL PRIMARY KEY , 
            emetteur varchar(20)NOT NULL , 
            destinataire varchar(20) NOT NULL , 
            typemessages int NOT NULL , 
            contentmessages varchar(500) NOT NULL , 
            datemessages TIMESTAMP , 
            etatmessages int NOT NULL)";

      $sqlIndex1 = "CREATE INDEX 
                    emetteur ON chatsmessages (emetteur)";

      $sqlIndex2 = "CREATE INDEX 
                    destinataire ON chatsmessages (destinataire)";                    

    static::process()->insert($sql, NULL, false);
    static::process()->insert($sqlIndex1, NULL, false);
    static::process()->insert($sqlIndex2, NULL, false);
  }


  /**
   * Create user if not exist
   */
  private function CreateFirstUserIfNotExist()
  {

    $sql = "INSERT INTO useraccount ( loginusers , userspwd) VALUES ( ? , ?)";

    static::process()->insert($sql, ['admin', $this->Guard->CryptPassword('admin')], true, false);
  }

  
  /** 
   * generate to MySQL tables if not exist
   */
  public function CreateTableMysql()
  {

    $this->CreateUserIfNotExist();

    $this->CreateFirstUserIfNotExist();

    $this->CreateAuthSecureIfNotExist();

    $this->CreateChatMessagesIfNotExist();

    $this->createRecentlyActionsIfNotExist();
  }

  /** 
   * generate to PostgreSQL tables if not exist
   */
  public function CreateTablePostgreSQL()
  {

    $this->CreatePostgeSQLUserIfNotExist();

    $this->CreateFirstUserIfNotExist();

    $this->CreateAuthSecurePostgeSQLIfNotExist();

    $this->CreateChatMessagesPostgeSQLIfNotExist();

    $this->createRecentlyActionsPostgeSQLIfNotExist();
  }
}
