<?php

namespace epaphrodite\database\requests\typeRequest\noSqlRequest\insert\AutoMigrations;

use MongoDB\BSON\ObjectId;
use epaphrodite\database\query\Builders;
use epaphrodite\epaphrodite\danho\GuardPassword;

class InitNoSeederGenerated extends Builders
{

  protected $Guard;

  public function __construct()
  {
    $this->Guard = new GuardPassword;
  }

  /**
   * Create user if not exist
   */
  private function CreateMongoUserIfNotExist()
  {

    $this->db(1)->createCollection("useraccount");
  }

  /**
   * Create recently users actions if not exist
   */
  private function createRecentlyActionsMongoIfNotExist()
  {

    $this->db(1)->createCollection('recentactions');
  }

  /**
   * Create auth_secure if not exist
   */
  private function CreateAuthSecureMongoIfNotExist()
  {

    $this->db(1)->createCollection('authsecure');
  }

  /**
   * Create messages if not exist
   */
  private function CreateChatMessagesMongoIfNotExist()
  {

    $this->db(1)->createCollection('chatsmessages');
  }

  /**
   * Create user if not exist
   */
  private function CreateFirstUserIfNotExist()
  {
    
    $document =[
      'idusers'=> new ObjectId(),
      'loginusers'=>'admin',
      'userspwd'=>$this->Guard->CryptPassword('admin'),
      'nomprenomsusers'=> NULL,
      'contactusers'=> NULL,
      'emailusers'=> NULL,
      'usersstat'=> 1,
      'typeusers'=> 1,
    ];

    $this->db(1)->selectCollection('useraccount')->insertOne($document);
  }

  
  /** 
   * generate to Mongo tables if not exist
   */
  public function CreateMongoCollections()
  {

    $this->CreateMongoUserIfNotExist();

    $this->CreateFirstUserIfNotExist();

    $this->CreateAuthSecureMongoIfNotExist();

    $this->CreateChatMessagesMongoIfNotExist();

    $this->createRecentlyActionsMongoIfNotExist();
  }

}
