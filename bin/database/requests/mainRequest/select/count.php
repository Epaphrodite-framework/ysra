<?php

namespace bin\database\requests\mainRequest\select;

use bin\database\requests\typeRequest\sqlRequest\select\count as CountCount;

class count extends CountCount
{

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function chat_messages()
  {

    return $this->checkDbType() === true ? $this->sqlChatMessages() : $this->noSqlchatMessages();
  }

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function CountAllUsers()
  {

    return $this->checkDbType() === true ? $this->sqlCountAllUsers() : $this->noSqlCountAllUsers();
  } 
  
  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function CountUsersByGroup(int $Group )
  {

    return $this->checkDbType() === true ? $this->sqlCountUsersByGroup($Group) : $this->noSqlCountUsersByGroup($Group);
  
  }
 
 }