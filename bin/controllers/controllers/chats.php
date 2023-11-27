<?php

namespace epaphrodite\controllers\controllers;

use epaphrodite\controllers\switchers\MainSwitchers;

final class chats extends MainSwitchers
{

    private string $alert = '';
    private string $ans = '';
    private array|bool $result = [];

    /**
     * List of users messages.
     * Send users messages
     * Receive users messages
     *
     * @param string $html
     * @return mixed
     */
    public function listOfMessages(string $html): void
    {

        $idtype = static::isGet('_see') ? $_GET['_see'] : 0;

        if (static::isPost('submit') && $idtype !== 0) {

            $this->result = static::initQuery()['insert']->AddUsersRights($idtype, $_POST['__droits__'], $_POST['__actions__']);

            if ($this->result === true) {
                $this->alert = 'alert-success';
                $this->ans = static::initNamespace()['msg']->answers('succes');
            }
            if ($this->result === false) {
                $this->alert = 'alert-danger';
                $this->ans = static::initNamespace()['msg']->answers('rightexist');
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'type' => $idtype,
                'reponse' => $this->ans,
                'alert' => $this->alert,
                'env' => static::initNamespace()['env'],
                'datas' => static::initNamespace()['datas'],
                'select' => static::initNamespace()['mozart']
            ],
            true
        )->get();
    }
}
