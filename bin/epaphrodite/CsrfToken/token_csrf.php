<?php

namespace bin\epaphrodite\CsrfToken;

use bin\epaphrodite\CsrfToken\validate_token;
use bin\epaphrodite\CsrfToken\GeneratedValues;

class token_csrf extends GeneratedValues{

    protected object $csrf;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->csrf = new validate_token;
    }

    /**
     * Token csrf input field
     * 
     * @return mixed 
     * */    
    public function input_field(){

        echo "<input type='hidden' name='token_csrf' value='".$this->getvalue()."' required \>";
    }  

    /**
     * csrf verification process...
     * @return bool
     */
    private function process(){
        
        return $this->csrf->token_verify();
    }

    /**
     * If csrf exist
     * @return bool
     */
    public function tocsrf(){
        
        if(!empty($_POST['token_csrf'])){ if($this->process()===true){ return true; }else{ return false;} }else{ return true; }
    }

}