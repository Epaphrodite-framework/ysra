<?php

namespace bin\database\requests\typeRequest\sqlRequest\select;

use bin\database\requests\typeRequest\noSqlRequest\select\auth as SelectAuth;

class auth extends SelectAuth
{

  /**
   * Verify if useraccount table exist in database (For mysql/postgresql)
   * @return bool
   */
  protected function if_table_exist(): bool
  {

    try {

      $sql = $this->table('useraccount')->SQuery();

      static::process()->select($sql, NULL, false);

      return true;
    } catch (\Exception $e) {

      return false;
    }
  }

  /**
   * Request to select all users of database (For mysql/postgresql)
   * 
   * @param string $loginuser
   * @return array
   */
  public function findSqlUsers(string $loginuser)
  {

    if ($this->if_table_exist() === true) {

      $sql = $this->table('useraccount')
        ->like('loginusers')
        ->SQuery();

      $result = static::process()->select($sql, ["$loginuser"], true);

      return $result;
    } else {

      static::firstSeederGeneration();
      return NULL;
    }
  }
}
