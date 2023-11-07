<?php

namespace bin\database\requests\typeRequest\sqlRequest\insert;

use bin\database\requests\typeRequest\noSqlRequest\insert\insert as InsertInsert;

class insert extends InsertInsert
{

    /**
     * Ajouter des utilisateurs dans le systeme a partir de la console
     *
     * @param string|null $login
     * @param int|null $idtype
     * @return bool
     */
    public function sqlConsoleAddUsers(?string $login = null, ?string $password = null, ?int $UserGroup = null)
    {

        $UserGroup = $UserGroup !== NULL ? $UserGroup : 1;

        if (!empty($login) && count(static::initQuery()['getid']->sqlGetUsersDatas($login)) < 1) {

            $sql = $this->table('useraccount')
                ->insert(' loginusers , userspwd , typeusers ')
                ->values(' ? , ? , ? ')
                ->IQuery();

            static::process()->insert($sql, [static::initNamespace()['env']->no_space($login), static::initConfig()['guard']->CryptPassword($password), $UserGroup], true);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Ajouter des chats
     * 
     * @param string|null $login
     * @param int|null $type
     * @param int|null $request
     * @param string|null $content
     * @return bool
     */
    public function addUserChats(?string $emetteur = null, ?string $destinataire = null, ?int $type = null, ?string  $content = null)
    {

        if (!empty($content) && !empty($destinataire)) {

            $sql = $this->table('chatsmessages')
                ->insert(' emetteur , destinataire , typemessages , datemessages , contentmessages ')
                ->values(' ? , ? , ? , ? , ? ')
                ->IQuery();

            static::process()->insert($sql, [static::initNamespace()['env']->no_space($emetteur), static::initNamespace()['env']->no_space($destinataire), $type, date("Y-m-d H:i:s"), $content], true);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Ajouter des droits utilisateurs dans le systeme
     *
     * @param string|null $login
     * @param int|null $idtype
     * @return bool
     */
    public function sqlAddUsers(?string $login = null, ?int $idtype = null)
    {

        if (!empty($login) && !empty($idtype) && count(static::initQuery()['getid']->sqlGetUsersDatas($login)) < 1) {

            $sql = $this->table('useraccount')
                ->insert(' loginusers , userspwd , typeusers ')
                ->values(' ? , ? , ? ')
                ->IQuery();

            static::process()->insert($sql, [static::initNamespace()['env']->no_space($login), static::initConfig()['guard']->CryptPassword($login . '@'), $idtype], true);

            $actions = "Add a User : " . $login;
            static::initQuery()['setting']->ActionsRecente($actions);

            return true;
        } else {
            return false;
        }
    }
}
