<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;

final class setting extends MainSwitchers
{

    private string $alert = '';
    private string $ans = '';
    private array|bool $result = [];

    /**
     * Adds user access rights.
     *
     * @param string $html
     * @return mixed
     */
    public function assignUserAccessRights(string $html): void
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

    /**
     * Lists all user groups with their rights.
     *
     * @param string $html
     * @return mixed
     */
    public function listOfUserRightsManagement(string $html): void
    {

        $idtype = static::isGet('_see') ? $_GET['_see'] : 0;

        if (static::isPost('_sendselected_') && !empty($_POST['group']) && !empty($_POST['_sendselected_'])) {

            // Authorize user right
            if ($_POST['_sendselected_'] == 1) {

                foreach ($_POST['group'] as $UsersGroup) {

                    $this->result = static::initQuery()['update']->users_rights($UsersGroup, 1);
                }

                if ($this->result === true) {
                    $this->alert = 'alert-success';
                    $this->ans = static::initNamespace()['msg']->answers('succes');
                }
                if ($this->result === false) {
                    $this->alert = 'alert-danger';
                    $this->ans = static::initNamespace()['msg']->answers('error');
                }
            }

            // Refuse user right
            if ($_POST['_sendselected_'] == 2) {

                foreach ($_POST['group'] as $UsersGroup) {

                    $this->result = static::initQuery()['update']->users_rights($UsersGroup, 0);
                }

                if ($this->result === true) {
                    $this->alert = 'alert-success';
                    $this->ans = static::initNamespace()['msg']->answers('succes');
                }
                if ($this->result === false) {
                    $this->alert = 'alert-danger';
                    $this->ans = static::initNamespace()['msg']->answers('error');
                }
            }

            // Deleted user right
            if ($_POST['_sendselected_'] == 3) {

                foreach ($_POST['group'] as $UsersGroup) {

                    $this->result = static::initQuery()['delete']->DeletedUsersRights($UsersGroup);
                }

                if ($this->result === true) {
                    $this->alert = 'alert-success';
                    $this->ans = static::initNamespace()['msg']->answers('succes');
                }
                if ($this->result === false) {
                    $this->alert = 'alert-danger';
                    $this->ans = static::initNamespace()['msg']->answers('error');
                }
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'reponse' => $this->ans,
                'alert' => $this->alert,
                'list' => static::initNamespace()['mozart'],
                'select' => static::initQuery()['getid']->users_rights($idtype),
            ],
            true
        )->get();
    }

    /**
     * Manages user access rights per group.
     *
     * @param string $html
     * @return mixed
     */
    public function managementOfUserAccessRights(string $html): void
    {


        if (static::isPost('__deleted__')) {

            $this->result = static::initQuery()['delete']->EmptyAllUsersRights($_POST['__deleted__']);

            if ($this->result === true) {
                $this->alert = 'alert-success';
                $this->ans = static::initNamespace()['msg']->answers('succes');
            }
            if ($this->result === false) {
                $this->alert = 'alert-danger';
                $this->ans = static::initNamespace()['msg']->answers('error');
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'select' => static::initNamespace()['datas']->userGroup(),
                'auth' => static::class('session'),
                'reponse' => $this->ans,
                'alert' => $this->alert
            ],
            true
        )->get();
    }
}
