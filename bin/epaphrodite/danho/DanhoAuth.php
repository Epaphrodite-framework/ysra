<?php

namespace epaphrodite\epaphrodite\danho;

use epaphrodite\epaphrodite\auth\StartUsersSession;

class DanhoAuth extends StartUsersSession
{

  /**
   **
   * Verify authentification of user
   * @param string $login
   * @param string $motpasse
   * @return bool
   */
  private function getUsersAuthManagers(string $login, string $motpasse):bool
  {

    if ((static::class('verify')->onlyNumberAndCharacter($login, 12)) === false) {

      $result = static::getGuard('sql')->checkUsers($login);

      if (!empty($result)) {

        if (static::getGuard('guard')->AuthenticatedPassword($result[0]["userspwd"], $motpasse) === true && $result[0]["usersstat"] === 1) {
          
          $this->StartUsersSession($result[0]["idusers"], $result[0]["loginusers"], $result[0]["nomprenomsusers"], $result[0]["contactusers"], $result[0]["emailusers"], $result[0]["typeusers"]);
          return true;
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

  /**
   **
   * Verify authentification of user
   * @param string $login
   * @param string $motpasse
   * @return bool
   */  
  public function UsersAuthManagers(string $login, string $motpasse):bool
  {
    return $this->getUsersAuthManagers($login, $motpasse);
  }
}
