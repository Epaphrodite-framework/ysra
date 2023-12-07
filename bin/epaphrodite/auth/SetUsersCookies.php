<?php

namespace Epaphrodite\epaphrodite\auth;

use Epaphrodite\epaphrodite\constant\epaphroditeClass;

class SetUsersCookies extends epaphroditeClass{

    public \Epaphrodite\epaphrodite\heredia\SettingHeredia $setting;

    /**
     * @return void
     */
    public function __construct(){

        $this->setting = new \Epaphrodite\epaphrodite\heredia\SettingHeredia;
    }
    
    /**
     * Set cookies
     *
     * @param string $cookie_value
     * @return void
     */
    public function set_user_cookies($cookie_value):void
    {
        setcookie(static::class('msg')->answers('token_name'), $cookie_value, $this->setting->coookies());

        $_COOKIE[static::class('msg')->answers('token_name')] = $cookie_value;
    }
}