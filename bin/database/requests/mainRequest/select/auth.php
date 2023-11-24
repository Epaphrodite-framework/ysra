<?php

namespace epaphrodite\database\requests\mainRequest\select;

use epaphrodite\database\requests\typeRequest\sqlRequest\select\auth as SelectAuth;

final class auth extends SelectAuth
{

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function checkUsers(string $loginuser)
  {

    return $this->checkDbType() === true ? $this->findSqlUsers($loginuser) : $this->findNosqlUsers($loginuser);
  }

}