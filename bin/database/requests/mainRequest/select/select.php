<?php

namespace epaphrodite\database\requests\mainRequest\select;

use epaphrodite\database\requests\typeRequest\sqlRequest\select\select as SelectSelect;

final class select extends SelectSelect
{

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function listeOfAllUsers(int $page, int $Nbreligne):array
  {

    return $this->checkDbType() === true ? $this->sqlListeOfAllUsers($page,$Nbreligne) : $this->noSqlListeOfAllUsers($page,$Nbreligne);
  }      

}