<?php

namespace bin\database\requests\mainRequest\select;

use bin\database\requests\typeRequest\sqlRequest\select\get_id as GetId;

final class get_id extends GetId
{

    /**
     * Request to select user right by module and 
     * 
     * @param string|null $module
     */
    public function GetModules(?string $module = null):array
    {

        return static::initConfig()['listright']->modules($module);
    }

    /**
     * Request to select user right by user type
     */
    public function users_rights($idtype_user):array
    {

        return static::initConfig()['listright']->users_rights($idtype_user);
    }

    /**
     * Request to select user right by user type
     * @param string|null $key
     * @return array
     */
    public function liste_menu(?string $key = null):array
    {

        return static::initConfig()['listright']->liste_menu($key);
    }  

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function GetUsersDatas(?string $login = null):array
  {

    return $this->checkDbType() === true ? $this->sqlGetUsersDatas($login) : $this->noSqlGetUsersDatas($login);
  }

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function GetUsersByGroup(int $page, int $Nbreligne, int $UsersGroup):array
  {

    return $this->checkDbType() === true ? $this->sqlGetUsersByGroup($page , $Nbreligne , $UsersGroup) : $this->noSqlGetUsersByGroup($page , $Nbreligne , $UsersGroup);
  }



}