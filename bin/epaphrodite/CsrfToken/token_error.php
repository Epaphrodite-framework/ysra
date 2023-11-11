<?php

namespace bin\epaphrodite\CsrfToken;

use bin\controllers\render\errors;

class token_error extends errors{
    
    /**
     * @return void
     */
    public function send():void
    {

        $this->error_419(); 
    }
}