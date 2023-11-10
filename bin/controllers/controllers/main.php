<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;
use bin\epaphrodite\translate\PythonCodesTranslate;

class main extends MainSwitchers
{
    private string $ans = '';
    private string $htmlClass = '';

    /**
     * Index page
     * @param string $html
     * @return mixed
     */
    public function Index($html)
    {

        static::rooter()->target(_DIR_MAIN_TEMP_ . $html)->content([])->get();
    }

    /**
     * Authentification page ( login )
     * @param string $html
     * @return mixed
     */
    public function Login($html)
    {

        if (static::isPost('submit')) {

            $result = static::initConfig()['auth']->usersAuthManagers($_POST['__codeuser__'], $_POST['__password__']);
            if ($result === false) {
                $this->ans = static::initNamespace()['msg']->answers('login-wrong');
                $this->htmlClass = "error";
            }
        }

        static::rooter()->target(_DIR_MAIN_TEMP_ . $html)->content(
            [
                'class' => $this->htmlClass,
                'reponse' => $this->ans
            ]
        )->get();
    }
}
