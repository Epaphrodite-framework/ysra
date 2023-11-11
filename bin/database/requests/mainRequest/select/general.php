<?php

namespace bin\database\requests\mainRequest\select;

use bin\database\requests\typeRequest\sqlRequest\select\general as GeneralGeneral;

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