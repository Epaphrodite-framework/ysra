<?php

namespace epaphrodite\epaphrodite\auth;

use epaphrodite\epaphrodite\constant\epaphroditeClass;

class StartUsersSession extends epaphroditeClass
{

  private $locate;

  public function StartUsersSession($AuthId, $AuthLogin, $AuthNomprenoms, $AuthContact, $AuthEmail, $AuthTypes)
  {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();


    static::class('global')->StartSession($AuthId, $AuthLogin, $AuthNomprenoms, $AuthContact, $AuthEmail, $AuthTypes);

    session_regenerate_id();

    if (static::class('secure')->get_csrf($this->key()) !== 0) {

      static::class('cookies')->set_user_cookies($this->key());
    }

    $this->locate = static::class('paths')->dashboard();

    header("Location: $this->locate ");
  }

  /**
   * Current cookies value
   */
  private function key(): string
  {
    if(_DATABASE_ === 'sql'){

      return !empty(static::class('secure')->CheckUserCrsfToken()) ? static::class('secure')->CheckUserCrsfToken() : $_COOKIE[static::class('msg')->answers('token_name')];
    }else{
      
      return !empty(static::class('secure')->noSqlCheckUserCrsfToken()) ? static::class('secure')->noSqlCheckUserCrsfToken() : $_COOKIE[static::class('msg')->answers('token_name')];
    }


  }
}
