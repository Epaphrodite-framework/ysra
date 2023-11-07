<?php

namespace bin\controllers\switchers;

use bin\epaphrodite\heredia\SwitchersHeredia;

class MainSwitchers extends SwitchersHeredia
{

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
