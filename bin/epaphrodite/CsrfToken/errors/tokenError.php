<?php

namespace epaphrodite\epaphrodite\CsrfToken\errors;

use epaphrodite\controllers\render\errors;

class tokenError extends errors{
    
    /**
     * @return void
     */
    public function send():void
    {
         $this->sendTologin();
    }
}