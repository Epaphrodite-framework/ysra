<?php

namespace Epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\migrations;

trait sqlSeeder{
   
/**
   * Create user if not exist
   */
  private function CreateFirstUserIfNotExist()
  {

    $this->table('useraccount')
      ->insert('loginusers , userspwd')
      ->values('?,?')
      ->param(['admin', $this->Guard->CryptPassword('admin')])
      ->IQuery();
  } 
}