<?php

namespace epaphrodite\controllers\controllers;

use epaphrodite\controllers\switchers\MainSwitchers;

final class dashboard extends MainSwitchers
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

    /**
     * Dashboard for admin
     * 
     * @param string $html
     * @return mixed
     */
    public function Administrator(string $html): void
    {

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'select' => $this->select,
                'count' => $this->count,
            ],
            true
        )->get();
    } 
    
    /**
     * Dashboard for users
     * 
     * @param string $html
     * @return mixed
     */
    public function Users(string $html): void
    {

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'select' => $this->select,
            ], 
            true 
        )->get();
    }        
}
