<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;

class setting extends MainSwitchers
{

    private string $alert ='';
    private string $ans = '';
    private object $msg;
    private object $env;
    private object $datas;
    private object $GetId;
    private object $update;
    private object $delete;
    private object $insert;
    private object $rightConfig;
    private array|bool $result = [];

    /**
     * @return void
     */
    public function __construct()
    {
        $this->env = new static::$initNamespace['env'];
        $this->msg = new static::$initNamespace['msg'];
        $this->datas = new static::$initNamespace['datas'];
        $this->GetId = new static::$initQueryConfig['getid'];
        $this->update = new static::$initQueryConfig['update'];
        $this->insert = new static::$initQueryConfig['insert'];
        $this->delete = new static::$initQueryConfig['delete'];
        $this->rightConfig = new static::$initNamespace['mozart'];
    }

    /**
     * Add user right
     * @param string $html
     * @return mixed
    */
    public function ajouterDroitsAccesUtilisateur($html){
        
        $idtype = 0;

        if (isset($_GET['_see'])) {
            $idtype = $_GET['_see'];
        }

        if (isset($_POST['submit']) && $idtype !== 0) {

            $this->result = $this->insert->AddUsersRights($idtype, $_POST['__droits__'], $_POST['__actions__']);

            if ($this->result === true) {
                $this->alert = 'alert-success';
                $this->ans = $this->msg->answers('succes');
            }
            if ($this->result === false) {
                $this->alert = 'alert-danger';
                $this->ans = $this->msg->answers('rightexist');
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(['type' => $idtype, 'reponse' => $this->ans, 'alert' => $this->alert, 'env' => $this->env, 'datas' => $this->datas, 'select' => $this->rightConfig], true)->get();

    }

    /**
     * All users group
     * @param string $html
     * @return mixed
    */    
    public function listeGestDroitsUsers($html){

        $select = [];
        $idtype = 0;

        if (isset($_GET['_see'])) {
            $idtype = $_GET['_see'];
        }

        if (isset($_POST['_sendselected_']) && !empty($_POST['group']) && !empty($_POST['_sendselected_'])) {

            // Authorize user right
            if ($_POST['_sendselected_'] == 1) {

                foreach ($_POST['group'] as $UsersGroup) {

                    $this->result = $this->update->users_rights($UsersGroup, 1);
                }

                if ($this->result === true) {
                    $this->alert = 'alert-success';
                    $this->ans = $this->msg->answers('succes');
                }
                if ($this->result === false) {
                    $this->alert = 'alert-danger';
                    $this->ans = $this->msg->answers('error');
                }
            }

            // Refuse user right
            if ($_POST['_sendselected_'] == 2) {

                foreach ($_POST['group'] as $UsersGroup) {

                    $this->result = $this->update->users_rights($UsersGroup, 0);
                }

                if ($this->result === true) {
                    $this->alert = 'alert-success';
                    $this->ans = $this->msg->answers('succes');
                }
                if ($this->result === false) {
                    $this->alert = 'alert-danger';
                    $this->ans = $this->msg->answers('error');
                }
            }

            // Deleted user right
            if ($_POST['_sendselected_'] == 3) {

                foreach ($_POST['group'] as $UsersGroup) {

                    $this->result = $this->delete->DeletedUsersRights($UsersGroup);
                }

                if ($this->result === true) {
                    $this->alert = 'alert-success';
                    $this->ans = $this->msg->answers('succes');
                }
                if ($this->result === false) {
                    $this->alert = 'alert-danger';
                    $this->ans = $this->msg->answers('error');
                }
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(['select' => $this->GetId->users_rights($idtype), 'reponse' => $this->ans, 'alert' => $this->alert, 'list' => $this->rightConfig], true)->get();

    }

    /**
     * Users right list per group
     * @param string $html
     * @return mixed
    */
    public function gestDroitsAccesUsers($html){

        if (isset($_POST['__deleted__'])) {

            $this->result = $this->delete->EmptyAllUsersRights($_POST['__deleted__']);

            if ($this->result === true) {
                $this->alert = 'alert-success';
                $this->ans = $this->msg->answers('succes');
            }
            if ($this->result === false) {
                $this->alert = 'alert-danger';
                $this->ans = $this->msg->answers('error');
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(['select' => $this->datas->userGroup(), 'auth' => static::class('session'), 'reponse' => $this->ans, 'alert' => $this->alert], true)->get();
    }
}
