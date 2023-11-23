<?php

namespace bin\epaphrodite\Kernel;

use bin\controllers\render\Http\ConfigHttp;
use bin\controllers\switchers\GetControllers;
use bin\epaphrodite\EpaphMozart\Templates\ConfigDashboardPages;

class RunKernel extends ConfigHttp
{

    private string $GetUrl;
    private object $Switchers;
    private object $InterfaceManager;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->Switchers = new GetControllers;
        $this->InterfaceManager = new ConfigDashboardPages;
    }

    /**
     * Run app
     * @return void
     */
    public function Run(): void
    {

        /**
         * @return string
         */
        $this->GetUrl = (string) $this->HttpResponses();

        /**
         * Get user authentification page or destroy session
         * @var mixed $GetUrl
         */
        if ($this->GetUrl === _LOGIN_ || $this->GetUrl === _LOGOUT_) {

            static::class('session')->deconnexion();

            $this->GetUrl = (string) $this->InterfaceManager->login();
        }

        /**
         * Get user authentification page or destroy session
         */
        if ($this->GetUrl === _DASHBOARD_ && static::class('session')->id() === NULL) {

            static::class('session')->deconnexion();

            $this->GetUrl = (string) $this->InterfaceManager->main();
        }

        /**
         * Get user dashbord page
         * @return mixed
         */
        if ($this->GetUrl === _DASHBOARD_ && static::class('session')->token_csrf() !== NULL && static::class('session')->id() !== NULL && static::class('session')->login() !== NULL) {

            $this->GetUrl = (string) $this->InterfaceManager->admin(static::class('session')->type(), $this->GetUrl);
        }

        /**
         * Force users to users to save his informations
         */
        if (static::class('session')->id() !== NULL && static::class('session')->login() !== NULL && empty(static::class('session')->nomprenoms()) && empty(static::class('session')->email()) && empty(static::class('session')->contact())) {

            $this->GetUrl = (string) $this->InterfaceManager->identification();
        }

        /**
         * Return true user page
         * @param null|array $provider
         * @param null|string $paths
         * @return void
         */
        $this->Switchers->SwitchMainControllers(explode('/', $this->GetUrl), $this->provider(explode('/', $this->GetUrl)));
    }
}
