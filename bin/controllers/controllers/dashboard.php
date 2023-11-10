<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;

class dashboard extends MainSwitchers
{

    private object $count;
    private object $select;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->count = new static::$initQueryConfig['count'];
        $this->select = new static::$initQueryConfig['general'];
    }

    /**
     * Dashboard for super admin
     * 
     * @param string $html
     * @return mixed
     */
    public function superAdmin(string $html): void
    {

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'select' => $this->select,
                'count' => $this->count,
            ],
            true
        )->get();
    }
}
