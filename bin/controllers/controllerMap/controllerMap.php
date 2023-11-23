<?php

namespace bin\controllers\controllerMap;

use bin\controllers\controllers\api;
use bin\controllers\controllers\main;
use bin\controllers\controllers\users;
use bin\controllers\controllers\chats;
use bin\controllers\controllers\prints;
use bin\controllers\controllers\setting;
use bin\controllers\controllers\dashboard;
use bin\controllers\controllers\statistic;

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
