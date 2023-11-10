<?php

declare(strict_types=1);

namespace bin\controllers\switchers;

use bin\controllers\controllers\api;
use bin\controllers\controllers\main;
use bin\controllers\controllers\users;
use bin\controllers\controllers\chats;
use bin\controllers\controllers\prints;
use bin\controllers\controllers\setting;
use bin\controllers\controllers\dashboard;
use bin\controllers\controllers\statistic;

class GetControllers extends ControllersSwitchers
{
    private object $api;
    private object $main;
    private object $users;
    private object $setting;
    private object $prints;
    private object $chats;
    private object $dashboard;
    private object $statistic;

    /**
     * Get class
     * @return void
     */
    public function __construct()
    {
        $this->api = new api;
        $this->main = new main;
        $this->users = new users;
        $this->chats = new chats;
        $this->prints = new prints;
        $this->setting = new setting;
        $this->dashboard = new dashboard;
        $this->statistic = new statistic;
    }

    /**
     * Return true controller
     *
     * @param null|array $provider
     * @param null|string $paths
     * @return void
     */
    public function SwitchMainControllers(?array $provider = [], ?string $paths = null): void
    {
        switch (true) {

            case static::GetController("dashboard", $provider, true):

                $this->SwitchControllers($this->dashboard, $paths, true);
                break;
            case static::GetController("statistic", $provider, true):

                $this->SwitchControllers($this->statistic, $paths, true);
                break;
            case static::GetController("users", $provider, true):

                $this->SwitchControllers($this->users, $paths, true);
                break;
            case static::GetController("setting", $provider, true):

                $this->SwitchControllers($this->setting, $paths, true);
                break;
            case static::GetController("prints", $provider, true):

                $this->SwitchControllers($this->prints, $paths, true);
                break;
            case static::GetController("chats", $provider, true):

                $this->SwitchControllers($this->chats, $paths, true);
                break;
            case static::GetController("api", $provider):

                $this->SwitchApiControllers($this->api, $paths, true);
                break;
            default:
            
                $this->SwitchControllers($this->main, $paths);
        }
    }
}
