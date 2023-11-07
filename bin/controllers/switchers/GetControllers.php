<?php declare(strict_types=1);

namespace bin\controllers\switchers;

use bin\controllers\switchers\ControllersSwitchers;

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
        $this->api = new \bin\controllers\controllers\api;
        $this->main = new \bin\controllers\controllers\main;
        $this->users = new \bin\controllers\controllers\users;
        $this->chats = new \bin\controllers\controllers\chats;
        $this->prints = new \bin\controllers\controllers\prints;
        $this->setting = new \bin\controllers\controllers\setting;
        $this->dashboard = new \bin\controllers\controllers\dashboard;
        $this->statistic = new \bin\controllers\controllers\statistic;
    }

    /**
     * Return true controller
     *
     * @param null|array $provider
     * @param null|string $paths
     * @return void
     */
    public function SwitchMainControllers(?array $provider = [], ?string $paths = NULL): void
    {

        /**
         * @param mixed $controller
         * @param mixed $provider
         * @param null|bool $switch
         * @return bool
         */
        switch ($provider) {
                // Connect to Dashboard controller
            case static::GetController("dashboard", $provider, true) === true:

                $this->SwitchControllers($this->dashboard, $paths, true);
                break;

                // Connect to statistic controller
            case static::GetController("statistic", $provider, true) === true:

                $this->SwitchControllers($this->statistic, $paths, true);
                break;

                // Connect to Users controller
            case static::GetController("users", $provider, true) === true:

                $this->SwitchControllers($this->users, $paths, true);
                break;

                // Connect to setting controller    
            case static::GetController("setting", $provider, true) === true:

                $this->SwitchControllers($this->setting, $paths, true);
                break;

                // Connect to print controller    
            case static::GetController("prints", $provider, true) === true:

                $this->SwitchControllers($this->prints, $paths, true);
                break;

                // Connect to chats controller    
            case static::GetController("chats", $provider, true) === true:

                $this->SwitchControllers($this->chats, $paths, true);
                break;

                // Connect to API controller    
            case static::GetController("api", $provider) === true:

                $this->SwitchApiControllers($this->api, $paths, true);
                break;

                // Connect to Main controller (Default)   
            default:
                $this->SwitchControllers($this->main, $paths);
        }
    }
}
