<?php

namespace epaphrodite\controllers\switchers;

use epaphrodite\epaphrodite\heredia\SwitchersHeredia;
use epaphrodite\epaphrodite\define\config\traits\currentSubmit;

class MainSwitchers extends SwitchersHeredia
{

    use currentSubmit;

    /**
     * Rooter constructor
     *
     * @return \epaphrodite\controllers\render\rooter
     */
    public static function rooter(): \epaphrodite\controllers\render\rooter
    {
        return new \epaphrodite\controllers\render\rooter;
    }
}
