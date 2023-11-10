<?php

namespace bin\controllers\controllers;

use bin\controllers\switchers\MainSwitchers;
use bin\epaphrodite\ExcelFiles\ImportFiles\ImportFiles;

class users extends MainSwitchers
{
    private string $ans = '';
    private string $alert = '';
    private array|bool $result = [];
    private object $ImportFiles;

    public function __construct()
    {
        $this->ImportFiles = new ImportFiles;
    }

    /**
     * Update user datas
     * @param string $html
     * @return mixed
     */
    public function modifierInfosUsers($html)
    {

        $login = static::initNamespace()['session']->login();

        if (static::isPost('submit')) {

            $this->result = static::initQuery()['update']->UpdateUserDatas($_POST['nomprenom'], $_POST['email'], $_POST['contact']);
            if ($this->result === true) {
                $this->ans = static::initNamespace()['msg']->answers('succes');
                $this->alert = 'alert-success';
            }
            if ($this->result === false) {
                $this->ans = static::initNamespace()['msg']->answers('erreur');
                $this->alert = 'alert-danger';
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'alert' => $this->alert,
                'reponse' => $this->ans,
                'select' => static::initQuery()['getid']->GetUsersDatas($login),
            ],
            true
        )->get();
    }

    /**
     * Update user password
     * @param string $html
     * @return mixed
     */
    public function modifierMotDePasse($html)
    {

        if (static::isPost('submit')) {

            $this->result = static::initQuery()['update']->changeUsersPassword($_POST['ancienmdp'], $_POST['newmdp'], $_POST['confirmmdp']);

            if ($this->result === 1) {
                $this->ans = static::initNamespace()['msg']->answers('no-identic');
                $this->alert = 'alert-danger';
            }
            if ($this->result === 2) {
                $this->ans = static::initNamespace()['msg']->answers('no-identic');
                $this->alert = 'alert-danger';
            }
            if ($this->result === 3) {
                $this->ans = static::initNamespace()['msg']->answers('mdpnotsame');
                $this->alert = 'alert-danger';
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'reponse' => $this->ans,
                'alert' => $this->alert,
            ],
            true
        )->get();
    }

    /**
     * upload users datas
     * 
     * @param string $html
     * @return mixed
     */
    public function importDesUtilisateurs($html)
    {

        if (static::isPost('submit')) {

            $SheetData = $this->ImportFiles->ImportExcelFiles($_FILES['file']['name']);

            if (!empty($SheetData)) {
                for ($i = 1; $i < count($SheetData); $i++) {

                    $CodeUtilisateur = $SheetData[$i][0];

                    $this->result = static::initQuery()['insert']->addUsers($CodeUtilisateur, $_POST['type']);

                    if ($this->result === true) {
                        $this->ans = static::initNamespace()['msg']->answers('succes');
                        $this->alert = 'alert-success';
                    }
                    if ($this->result === false) {
                        $this->ans = static::initNamespace()['msg']->answers('erreur');
                        $this->alert = 'alert-danger';
                    }
                }
            } else {
                $this->ans = static::initNamespace()['msg']->answers('fileempty');
                $this->alert = 'alert-danger';
            }
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'reponse' => $this->ans,
                'alert' => $this->alert,
            ],
            true
        )->get();
    }

    /**
     * Users list
     * @param string $html
     * @return mixed
     */
    public function listeDesUtilisateurs($html)
    {

        $total = 0;
        $list = [];
        $Nbreligne = 100;
        $page = isset($_GET['_p']) ? $_GET['_p'] : 1;
        $position = !empty($_GET['filtre']) ? $_GET['filtre'] : NULL;

        if (static::isPost('_sendselected_') && !empty($_POST['users']) && !empty($_POST['_sendselected_'])) {

            foreach ($_POST['users'] as $login) {

                $this->result = $_POST['_sendselected_'] == 1 ? static::initQuery()['update']->updateEtatsUsers($login) : static::initQuery()['update']->initUsersPassword($login);
            }

            if ($this->result === true) {
                $this->ans = static::initNamespace()['msg']->answers('succes');
                $this->alert = 'alert-success';
            }
            if ($this->result === false) {
                $this->ans = static::initNamespace()['msg']->answers('error');
                $this->alert = 'alert-danger';
            }
        }

        if (static::isGet('submitsearch') && !empty($_GET['datasearch'])) {

            $total = 0;
            $list = static::initQuery()['getid']->GetUsersDatas($_GET['datasearch']);
            if (!empty($list)) {
                $total = 1;
            }
        } elseif (empty($_GET['datasearch'])) {

            $total = !empty($_GET['filtre']) ? static::initQuery()['count']->CountUsersByGroup($_GET['filtre']) : static::initQuery()['count']->CountAllUsers();
            $list = !empty($_GET['filtre']) ? static::initQuery()['getid']->GetUsersByGroup($page, $Nbreligne, $_GET['filtre']) : static::initQuery()['select']->listeOfAllUsers($page, $Nbreligne);
        }

        static::rooter()->target(_DIR_ADMIN_TEMP_ . $html)->content(
            [
                'alert' => $this->alert,
                'liste_users' => $list,
                'reponse' => $this->ans,
                'pagecourante' => $page,
                'position' => $position,
                'effectif_total' => $total,
                'select' => static::initQuery()['getid'],
                'pages_total' => ceil(($total) / $Nbreligne),
            ],
            true
        )->get();
    }
}
