<?php

namespace Epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations;

use Epaphrodite\database\query\Builders;
use Epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\seeders\sqlSeeder;
use Epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\migrations\mysqlMigrations;
use Epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\migrations\sqlLiteMigrations;
use Epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\migrations\postgreSqlMigrations;
use Epaphrodite\epaphrodite\danho\GuardPassword;

class InitSeederGenerated extends Builders
{

  use mysqlMigrations, postgreSqlMigrations, sqlLiteMigrations, sqlSeeder;
  protected $Guard;

  public function __construct()
  {
    $this->Guard = new GuardPassword;
  }

  /** 
   * generate to MySQL tables if not exist
   */
  public function CreateTableMysql()
  {

    $this->CreateUserIfNotExist();

    $this->CreateAuthSecureIfNotExist();

    $this->CreateChatMessagesIfNotExist();

    $this->createRecentlyActionsIfNotExist();

    $this->CreateFirstUserIfNotExist();
  }

  /** 
   * generate to PostgreSQL tables if not exist
   */
  public function CreateTablePostgreSQL()
  {

    $this->CreatePostgeSQLUserIfNotExist();

    $this->CreateAuthSecurePostgeSQLIfNotExist();

    $this->CreateChatMessagesPostgeSQLIfNotExist();

    $this->createRecentlyActionsPostgeSQLIfNotExist();

    $this->CreateFirstUserIfNotExist();
  }

  /** 
   * generate to SqlLite tables if not exist
   */
  public function createTableSqlLite()
  {

    $this->CreateSqlLitUserIfNotExist();

    $this->CreateAuthSecureSqlLitIfNotExist();

    $this->CreateChatMessagesSqlLitIfNotExist();

    $this->createRecentlyActionsSqlLitIfNotExist();

    $this->CreateFirstUserIfNotExist();
  }  
}
