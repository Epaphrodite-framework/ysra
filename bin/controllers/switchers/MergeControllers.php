<?php

namespace bin\controllers\switchers;

use bin\epaphrodite\constant\epaphroditeClass;
use bin\epaphrodite\heredia\SwitchersHeredia;

class MergeControllers extends epaphroditeClass implements contractController
{

    /**
     * @param mixed $class
     * @param mixed $pages
     * @param bool $switch
     * @return mixed
     */
    public function SwitchControllers($class, $pages, ?bool $switch = false)
    {

        $targetFunction = $this->transformToFunction($pages);

        return static::directory($pages, $switch) === false && $this->checkAutorisation($pages, $switch) === true ? static::class('errors')->error_404() : $class->$targetFunction($pages);
    }

    /**
     * @param mixed $class
     * @param mixed $pages
     * @return mixed
     */
    public function SwitchApiControllers($class, $pages)
    {

        $targetFunction = $this->transformToFunction($pages);
        return $class->$targetFunction();
    }

    /**
     * @param string|null $html
     * @param bool|false $switch
     * @return bool
     */
    private static function directory(?string $html = null, ?bool $switch = false)
    {

        return $switch === false ? file_exists(_DIR_VIEWS_ . _DIR_MAIN_TEMP_ . $html . _FRONT_) : file_exists(_DIR_VIEWS_ . _DIR_ADMIN_TEMP_ . $html . _FRONT_);
    }

    /**
     * @param string|null $target
     * @param null|string $autorize
     * @return bool|null
     */
    private function checkAutorisation($target, $autorize)
    {

        return (new SwitchersHeredia)->swicthPagesAutorisation($target, $autorize);
    }

    /**
     *  @param string $initPage
     * @return string
     */
    private function transformToFunction($initPage)
    {

        $extension = _MAIN_EXTENSION_;

        $initPage = preg_replace("/$extension$/", '', $initPage);

        $parts = explode('_', $initPage);

        $camelCaseParts = array_map(function ($part) {
            return ucfirst($part);
        }, $parts);

        $camelCaseString = implode('', $camelCaseParts);

        $contract = explode('/', $camelCaseString);

        $parts = count($contract) > 1 ? $contract[1] : $contract[0];

        return $parts;
    }
}
