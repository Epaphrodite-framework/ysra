<?php

namespace bin\epaphrodite\danho;

use bin\epaphrodite\auth\StartUsersSession;

class DanhoAuth extends StartUsersSession
{

  private object $Guard;
  private object $AuthSQL;

  /**
   * Get class 
   * @return void
   */
  public function __construct()
  {
    $this->Guard = new static::$initGuardsConfig['guard'];
    $this->AuthSQL = new static::$initGuardsConfig['sql'];
  }

  /**
   * **********************************************************************************************
   * Verify authentification of user
   *
   * @param string $login
   * @param string $motpasse
   * @return bool
   */
  public function UsersAuthManagers(string $login, string $motpasse)
  {

    if ((static::class('verify')->onlyNumberAndCharacter($login, 12)) === false) {

      $result = $this->AuthSQL->checkUsers($login);

      if (!empty($result)) {

        if ($this->Guard->AuthenticatedPassword($result[0]["userspwd"], $motpasse) === true && $result[0]["usersstat"] === 1) {

          $this->StartUsersSession($result[0]["idusers"], $result[0]["loginusers"], $result[0]["nomprenomsusers"], $result[0]["contactusers"], $result[0]["emailusers"], $result[0]["typeusers"]);
        } else {
          return false;
        }
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
