<?php

declare(strict_types=1);

namespace bin\controllers\switchers;

use bin\controllers\controllerMap\controllerMap;

class GetControllers extends ControllersSwitchers
{
    use controllerMap;

    /**
     * Return true controller
     *
     * @param null|array $provider
     * @param null|string $paths
     * @return void
     */
    private function getSwitchMainControllers(?array $provider = [], ?string $paths = null): void
    {

        $controllerMap = (array) $this->controllerMap();

        foreach ($controllerMap as $controllerName => $method) {

            $switcher = isset($method[2]);

            if (static::getController($controllerName, $provider, $switcher)) {
                $controllerInstance = $this;
                $methodName = $method[1];
                $arguments = [$method[0], $paths, true];

                call_user_func_array([$controllerInstance, $methodName], $arguments);
                return;
            }
        }

        $this->SwitchControllers($this->mainController(), $paths);
    }

    /**
     * @return void
     */
    public function SwitchMainControllers(?array $provider = [], ?string $paths = null): void
    {

        $this->getSwitchMainControllers($provider, $paths);
    }
}
