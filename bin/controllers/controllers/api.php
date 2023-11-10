<?php

namespace bin\controllers\controllers;

use bin\epaphrodite\heredia\HerediaApiSwitcher;
use bin\epaphrodite\env\config\ResponseSequence;

class api extends HerediaApiSwitcher
{

    protected object $Response;

    public function __construct()
    {
        $this->Response = new ResponseSequence;
    }

    /**
     * All users list
     * @return array
     */
    public function listeDesUtilisateurs()
    {

        $Result = [];
        $list = static::isGet('list') ? $_GET['list'] : 0;

        if (!empty($_GET['list'])) {

            return $Result == true ? $this->Response->JsonResponse(200, []) : $this->Response->JsonResponse(400, []);
        } else {

            return $this->Response->JsonResponse(400, $Result);
        }
    }
}
