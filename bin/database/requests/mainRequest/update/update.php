<?php

namespace bin\database\requests\mainRequest\update;

use bin\database\requests\typeRequest\sqlRequest\update\update as UpdateUpdate;

class update extends UpdateUpdate
{

    /**
     * Request to update users rights
     * 
     * @param int|null $idtype_user
     * @param int|null $etat
     * @return bool
     */
    public function users_rights(?string $IdTypeUsers = null, ?int $etat = null)
    {

        return  static::initConfig()['updright']->UpdateUsersRights($IdTypeUsers, $etat) === true ? true : false;
    }

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function UpdateUserDatas(string $nomprenoms, string $email, string $number)
  {

    return $this->checkDbType() === true ? $this->sqlUpdateUserDatas($nomprenoms,$email,$number) : $this->noSqlUpdateUserDatas($nomprenoms,$email,$number);
  }

  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function updateEtatsUsers(string $login)
  {

    return $this->checkDbType() === true ? $this->sqlUpdateEtatsUsers($login) : $this->noSqlUpdateEtatsUsers($login);
  }
  
  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @return array
   */
  public function initUsersPassword(string $login)
  {

    return $this->checkDbType() === true ? $this->sqlInitUsersPassword($login) : $this->noSqlInitUsersPassword($login);
  } 
  
  /**
   * Verify if exist in database
   *
   * @param string $loginuser
   * @param string $newPassword
   * @param string $confirMdp
   * @return array
   */
  public function changeUsersPassword(string $oldPassword, string $newPassword, string $confirMdp)
  {

    return $this->checkDbType() === true ? $this->sqlChangeUsersPassword($oldPassword , $newPassword , $confirMdp) : $this->noSqlChangeUsersPassword($oldPassword , $newPassword , $confirMdp);
  }  
  
  /**
   * Verify if exist in database
   *
   * @param string $login
   * @param string $password
   * @param string $UserGroup
   * @return array
   */
  public function ConsoleUpdateUsers(?string $login = null, ?string $password = NULL, ?int $UserGroup = NULL)
  {

    return $this->checkDbType() === true ? $this->sqlConsoleUpdateUsers($login , $password , $UserGroup) : $this->noSqlConsoleUpdateUsers($login , $password , $UserGroup);
  }   

 }