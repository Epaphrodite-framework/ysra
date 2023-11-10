<?php

namespace bin\controllers\switchers;

use bin\epaphrodite\heredia\SwitchersHeredia;
use bin\epaphrodite\define\config\traits\currentSubmit;

class MainSwitchers extends SwitchersHeredia
{

    use currentSubmit;

    /**
     * Rooter constructor
     *
     * @return \bin\controllers\render\rooter
     */
    public static function rooter(): \bin\controllers\render\rooter
    {
        return new \bin\controllers\render\rooter;
    }
}
