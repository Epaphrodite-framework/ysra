<?php

namespace bin\database\requests\typeRequest\sqlRequest\update;

use bin\database\requests\typeRequest\noSqlRequest\update\update as UpdateUpdate;

class update extends UpdateUpdate
{

    /**
     * Request to update chat messages
     * 
     * @param string|null $users
     * @return bool
     */
    public function chat_messages($users)
    {
        $sql = $this->table('chatsmessages')
            ->set(['etatmessages'])
            ->where('emetteur')
            ->and(['destinataire', 'etatmessages'])
            ->UQuery();

        static::process()->update($sql, [0, $users, static::initNamespace()['session']->login(), 1], true);
    }

    /**
     * Request to update users password
     *
     * @param string $OldPassword
     * @param string $NewPassword
     * @param string $confirmdp
     * @return void
     */
    public function sqlChangeUsersPassword($OldPassword, $NewPassword, $confirmdp)
    {

        if (static::initConfig()['guard']->GostCrypt($NewPassword) === static::initConfig()['guard']->GostCrypt($confirmdp)) {

            $result = static::initQuery()['auth']->findSqlUsers(static::initNamespace()['session']->login());

            if (!empty($result)) {

                if (static::initConfig()['guard']->AuthenticatedPassword($result[0]["userspwd"], $OldPassword) === true) {

                    $sql = $this->table('useraccount')
                        ->set(['userspwd'])
                        ->where('idusers')
                        ->UQuery();

                    static::process()->update($sql, [static::initConfig()['guard']->CryptPassword($NewPassword), static::initNamespace()['session']->id()], true);

                    $actions = "Change password : " . static::initNamespace()['session']->login();
                    static::initQuery()['setting']->ActionsRecente($actions);

                    $this->desconnect = static::initNamespace()['paths']->logout();

                    header("Location: $this->desconnect ");
                } else {
                    return 3;
                }
            } else {
                return 2;
            }
        } else {
            return 1;
        }
    }

    /**
     * Update user password and user group
     *
     * @param integer $login
     * @param string|NULL $password
     * @param int|NULL $UserGroup
     * @return bool
     */
    public function sqlConsoleUpdateUsers(?string $login = null, ?string $password = NULL, ?int $UserGroup = NULL)
    {
        $GetDatas = static::initQuery()['getid']->sqlGetUsersDatas($login);

        if (!empty($GetDatas)) {

            $password = $password !== NULL ? $password : $login;
            $UserGroup = $UserGroup !== NULL ? $UserGroup : $GetDatas[0]['typeusers'];

            $sql = $this->table('useraccount')
                ->set(['userspwd', 'typeusers'])
                ->where('loginusers')
                ->UQuery();

            static::process()->update($sql, [static::initConfig()['guard']->CryptPassword($password), $UserGroup, "$login"], true);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Request to initialize user password
     *
     * @param integer $UsersLogin
     * @return bool
     */
    public function sqlInitUsersPassword(string $UsersLogin)
    {

        $sql = $this->table('useraccount')
            ->set(['userspwd'])
            ->where('loginusers')
            ->UQuery();

        static::process()->update($sql, [static::initConfig()['guard']->CryptPassword($UsersLogin), $UsersLogin], true);

        $actions = "Reset user password : " . $UsersLogin;
        static::initQuery()['setting']->ActionsRecente($actions);

        return true;
    }

    /**
     * Request to switch user connexion state
     *
     * @param integer $login
     * @return bool
     */
    public function sqlUpdateEtatsUsers(string $login)
    {

        $GetUsersDatas = static::initQuery()['getid']->sqlGetUsersDatas($login);

        if (!empty($GetUsersDatas)) {

            $state = !empty($GetUsersDatas[0]['usersstat']) ? 0 : 1;

            $etat_exact = "Close";

            if ($state == 1) {
                $etat_exact = "Open";
            }

            $sql = $this->table('useraccount')
                ->set(['usersstat'])
                ->where('loginusers')
                ->UQuery();

            static::process()->update($sql, [$state, $GetUsersDatas[0]['loginusers']], true);

            $actions = $etat_exact . " of the user's account : " . $GetUsersDatas[0]['loginusers'];
            static::initQuery()['setting']->ActionsRecente($actions);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Request to update user datas
     *
     * @param string $nomprenoms
     * @param string $email
     * @param string $number
     * @return bool
     */
    public function sqlUpdateUserDatas(string $nomprenoms, string $email, string $number)
    {

        if (static::initNamespace()['verify']->onlyNumber($number, 11) === false) {

            $sql = $this
                ->table('useraccount')
                ->set(['contactusers', 'emailusers', 'nomprenomsusers', 'usersstat'])
                ->where('idusers')
                ->UQuery();

            static::process()->update($sql, [$number, $email, $nomprenoms, 1, static::initNamespace()['session']->id()], true);

            $_SESSION["nom_prenoms"] = $nomprenoms;

            $_SESSION["contact"] = $number;

            $_SESSION["email"] = $email;

            $actions = "Edit Personal Information : " . static::initNamespace()['session']->login();
            static::initQuery()['setting']->ActionsRecente($actions);

            $this->desconnect = static::initNamespace()['paths']->dashboard();

            header("Location: $this->desconnect ");
        } else {
            return false;
        }
    }
}
