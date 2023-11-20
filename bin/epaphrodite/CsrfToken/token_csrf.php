<?php

declare(strict_types=1);

namespace bin\epaphrodite\CsrfToken;

use bin\epaphrodite\CsrfToken\GeneratedValues;

class token_csrf extends GeneratedValues{

    /**
     * Build token crsf input field
     * 
     * @return void 
     * */    
    private function buildInputField():void
    {

        echo "<input type='hidden' name='".CSRF_FIELD_NAME."' value='". htmlspecialchars($this->getValue(), ENT_QUOTES, 'UTF-8')."' required \>";
    }     

    /**
     * csrf verification process...
     * 
     * @return bool
     */
    private function process():bool{
        
        return static::initConfig()['crsf']->isValidToken();
    }

    /**
     * Get Token csrf input field
     * 
     * @return void 
     * */    
    public function input_field():void{

        $this->buildInputField();
    }  

    /**
     * Check if CSRF token exists and is valid
     *
     * @return bool
     */
    public function tocsrf():bool{
        
        if (!empty($_POST[CSRF_FIELD_NAME])) {
            
            return $this->process();
        } else {
            return true;
        }
    }

}