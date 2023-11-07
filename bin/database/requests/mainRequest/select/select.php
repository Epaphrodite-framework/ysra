<?php

namespace bin\database\requests\mainRequest\select;

use bin\database\requests\typeRequest\sqlRequest\select\select as SelectSelect;

class select extends SelectSelect
{

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function listeOfAllUsers(int $page, int $Nbreligne)
  {

    return $this->checkDbType() === true ? $this->sqlListeOfAllUsers($page,$Nbreligne) : $this->noSqlListeOfAllUsers($page,$Nbreligne);
  }      

}