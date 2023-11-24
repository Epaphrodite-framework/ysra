<?php

namespace epaphrodite\controllers\controllerMap;

use epaphrodite\controllers\controllers\api;
use epaphrodite\controllers\controllers\main;
use epaphrodite\controllers\controllers\users;
use epaphrodite\controllers\controllers\chats;
use epaphrodite\controllers\controllers\prints;
use epaphrodite\controllers\controllers\setting;
use epaphrodite\controllers\controllers\dashboard;
use epaphrodite\controllers\controllers\statistic;

trait controllerMap
{

    /**
     * Returns an array mapping controllers to their respective instances and methods.
     *
     * @return array The mapping of controllers with their instances and methods.
     */
    private function controllerMap(): array
    {

        return [
            "api" => [ new api, 'SwitchApiControllers', false ],
            "chats" => [ new chats, 'SwitchControllers', true ],
            "users" => [ new users, 'SwitchControllers', true ],
            "prints" => [ new prints, 'SwitchControllers', true ],
            "setting" => [ new setting, 'SwitchControllers', true ],
            "statistic" => [ new statistic, 'SwitchControllers', true ],
            "dashboard" => [ new dashboard, 'SwitchControllers', true ],
        ];
    }

    /**
     * Returns an instance of the 'main' controller.
     *
     * @return object An instance of the 'main' controller.
     */
    private function mainController():object
    {
        return new main;
    }
}
