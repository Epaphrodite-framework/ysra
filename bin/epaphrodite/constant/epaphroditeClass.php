<?php

namespace bin\epaphrodite\constant;

use bin\epaphrodite\define\config\currentNameSpace;

class epaphroditeClass extends currentNameSpace{

    /**
     * @param mixed $chaine
     * @return object
     */
    public static function class($chaine){ return new static::$initNamespace[$chaine]; } 

    /**
     * @return string
     */
    public static function JsonDatas(){ return _DIR_JSON_DATAS_ . '/JsonDatas.json'; }
}