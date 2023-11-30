<?php

namespace epaphrodite\controllers\controllers;

use epaphrodite\controllers\switchers\MainSwitchers;
use epaphrodite\epaphrodite\ExcelFiles\ImportFiles\ImportFiles;

final class users extends MainSwitchers
{
    private string $ans = '';
    private string $alert = '';
    private array|bool $result = [];
    private object $importFiles;

    public function __construct()
    {
        $this->importFiles = new ImportFiles;
    }

    /**
     * Update user datas
     * @param string $html
     * @return mixed
     */
    public function editUsersInfos(string $html): void
    {

        $login = static::initNamespace()['session']->login();

        if (static::isPost('submit')) {

            $this->result = static::initQuery()['update']->updateUserDatas(static::getPost('nomprenom'), static::getPost('email'), static::getPost('contact'));
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
    public function changePassword(string $html): void
    {

        if (static::isPost('submit')) {

            $this->result = static::initQuery()['update']->changeUsersPassword(static::getPost('ancienmdp'), static::getPost('newmdp'), static::getPost('confirmmdp'));

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
    public function importUsers(string $html): void
    {

        if (static::isPost('submit')) {

            $SheetData = $this->importFiles->ImportExcelFiles($_FILES['file']['name']);

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
     * @return void
     */
    public function allUsersList(string $html): void
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

            $list = static::initQuery()['getid']->GetUsersDatas($_GET['datasearch']);
            $total = (!empty($list)) ? count($list) : 0;
            
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
