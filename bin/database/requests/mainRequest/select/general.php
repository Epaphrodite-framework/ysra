<?php

namespace epaphrodite\database\requests\mainRequest\select;

use epaphrodite\database\requests\typeRequest\sqlRequest\select\general as GeneralGeneral;

final class general extends GeneralGeneral
{

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function RecentlyActions():array
  {

    return $this->checkDbType() === true ? $this->sqlRecentlyActions() : $this->noSqlRecentlyActions();
  }

}