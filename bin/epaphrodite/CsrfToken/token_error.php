<?php

namespace epaphrodite\epaphrodite\CsrfToken;

use epaphrodite\controllers\render\errors;

class token_error extends errors{
    
    /**
     * @return void
     */
    public function send():void
    {

        $this->error_419(); 
    }
}