<?php

namespace bin\epaphrodite\CsrfToken;

use bin\epaphrodite\CsrfToken\token_error;
use bin\epaphrodite\CsrfToken\csrf_secure;
use bin\epaphrodite\CsrfToken\GeneratedValues;

class validate_token extends GeneratedValues
{

    protected object $error;
    protected object $secure;

    /**
     * construct class
     * @return void
     */
    public function __construct()
    {
        $this->error = new token_error;
        $this->secure = new csrf_secure;
    }

    /**
     * hidden token csrf input
     * 
     * @return string
     */
    private function get_input_token():string
    {

        return (!empty($_POST['token_csrf'])) ? $_POST['token_csrf'] : ((!empty($_GET['token_csrf'])) ? $_GET['token_csrf'] : NULL);
    }

    /**
     * Verify token crsf key
     *
     * @return bool
     */
    public function token_verify()
    {
       
        return (static::class('session')->login() !== NULL) ? $this->on() : $this->off();
    }

    /**
     * Turn on
     * @return bool
     */
    protected function on():bool
    {

        if(_DATABASE_ === 'sql'){

            if (hash('gost', $this->secure->secure()) === hash('gost', $this->get_input_token()) && hash('gost', $this->secure->secure()) === hash('gost', $this->getvalue()) && hash('gost', $this->get_input_token()) === hash('gost', $this->getvalue())) {
                return true;
            } else {
                $this->error->send();
            }

        }else{
           
            if (hash('gost', $this->secure->noSqlSecure()) === hash('gost', $this->get_input_token()) && hash('gost', $this->secure->noSqlSecure()) === hash('gost', $this->getvalue()) && hash('gost', $this->get_input_token()) === hash('gost', $this->getvalue())) {
               
                return true;
            } else {
                $this->error->send();
            }            
        }

    }

    /**
     * Turn off
     * @return bool
     */
    protected function off():bool
    {

        if (hash('gost', $this->get_input_token()) === hash('gost', $this->getvalue())) {
            return true;
        } else {
            $this->error->send();
        }
    }
}
