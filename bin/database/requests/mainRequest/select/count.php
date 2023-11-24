<?php

namespace epaphrodite\database\requests\mainRequest\select;

use epaphrodite\database\requests\typeRequest\sqlRequest\select\count as CountCount;

final class count extends CountCount
{

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function chat_messages(): int
  {

    return $this->checkDbType() === true ? $this->sqlChatMessages() : $this->noSqlchatMessages();
  }

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function CountAllUsers():int
  {

    return $this->checkDbType() === true ? $this->sqlCountAllUsers() : $this->noSqlCountAllUsers();
  } 
  
  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function CountUsersByGroup(int $Group ):int
  {

    return $this->checkDbType() === true ? $this->sqlCountUsersByGroup($Group) : $this->noSqlCountUsersByGroup($Group);
  
  }
 
 }