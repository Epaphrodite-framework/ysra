<?php

namespace bin\database\requests\typeRequest\sqlRequest\select;

use bin\database\requests\typeRequest\noSqlRequest\select\get_id as SelectGet_id;

class get_id extends SelectGet_id
{

    /**
     * Request to get users by group
     *
     * @param integer $page
     * @param integer $Nbreligne
     * @param integer $UsersGroup
     * @return array
     */
    public function sqlGetUsersByGroup(int $page, int $Nbreligne, int $UsersGroup):array
    {

        $sql = $this->table('useraccount')
            ->where('typeusers')
            ->limit((($page - 1) * $Nbreligne), $Nbreligne)
            ->orderby('loginusers', 'ASC')
            ->SQuery();

        $result = static::process()->select($sql, [$UsersGroup], true);

        return $result;
    }

    /** 
     * Request to select users by login
     *
     * @param string|null $login
     * @return array
     */
    public function sqlGetUsersDatas(?string $login = null):array
    {

        $login = static::initNamespace()['env']->no_space($login);

        $sql = $this->table('useraccount')
            ->like('loginusers')
            ->SQuery();

        $result = static::process()->select($sql, ["$login"], true);

        return $result;
    }
}
