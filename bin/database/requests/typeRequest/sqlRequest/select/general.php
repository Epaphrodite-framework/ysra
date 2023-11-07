<?php

namespace bin\database\requests\typeRequest\sqlRequest\select;

use bin\database\requests\typeRequest\noSqlRequest\select\general as SelectGeneral;

class general extends SelectGeneral
{

    /**
     * Request to get six last actions
     * @return array
     */
    public function sqlRecentlyActions()
    {

        $UserConnected = static::initNamespace()['session']->login();

        $sql = $this->table('recentactions')
            ->like('usersactions')
            ->orderBy('idrecentactions', 'DESC')
            ->limit(0,6)
            ->SQuery();

        $result = static::process()->select($sql, ["$UserConnected"], true);

        return $result;
    }
}
