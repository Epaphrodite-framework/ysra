<?php

namespace bin\epaphrodite\define;

use bin\epaphrodite\define\config\traits\currentVariableNameSpaces;

class SetTextMessages
{

    use currentVariableNameSpaces;

    private object $FrenchMessages;
    private object $EnglishMessages;

    public function __construct()
    {
        $this->EnglishMessages = new static::$initMessageCode['eng'];
        $this->FrenchMessages = new static::$initMessageCode['french'];
    }

    /**
     * @param mixed $MessageCode
     * @param string $lang
     * @return mixed
    */
    public function answers($MessageCode , $lang = _LANG_)
    {

        switch ( $lang ) 
        {
            case $lang === 'eng':
                return $this->EnglishMessages->SwithAnswers($MessageCode);
                break;
              
            default:
            return $this->FrenchMessages->SwithAnswers($MessageCode);
        }
    }
}
