<?php

namespace epaphrodite\epaphrodite\heredia;

use epaphrodite\epaphrodite\env\config\GeneralConfig;
use epaphrodite\epaphrodite\define\config\traits\currentSubmit;
use epaphrodite\epaphrodite\define\config\traits\currentFunctionNamespaces;

class HerediaApiSwitcher extends GeneralConfig
{

    use currentFunctionNamespaces , currentSubmit;

    /**
     * @param mixed $Methods
     * @param mixed $autorisation
     * @param mixed $inipaths
     * @param mixed $FromUrl
     * @return bool
    */    
    protected static function GetApiRoot( $Methods , $inipaths , $FromUrl , $autorisation )
    {
   
        return static::GetMethodsAutorisation( $Methods , $autorisation , $inipaths , $FromUrl ) === true ? true : NULL;
    }

    /**
     * @param mixed $Methods
     * @param mixed $autorisation
     * @param mixed $inipaths
     * @param mixed $FromUrl
     * @return bool
    */
    private static function GetMethodsAutorisation( $Methods , $autorisation , $inipaths , $FromUrl )
    {
       return $Methods === static::methods()&&$autorisation===true&&$inipaths._MAIN_EXTENSION_ === $FromUrl ? true : false;
        
    }

    /**
     * @return bool
    */
    private static function VerifyKeyGen(){

        $MethodValues [] = '$_'.static::methods();

       return isset($MethodValues[_KEYGEN_]) && in_array( $MethodValues[_KEYGEN_] , static::$StaticKeygenList) ? true : false;
    }

}