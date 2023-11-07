<?php

namespace bin\database\requests\typeRequest\sqlRequest\select;

use bin\database\requests\typeRequest\noSqlRequest\select\select as SelectSelect;

class select extends SelectSelect
{

    /**
     * Request to get users list
     *
     * @param integer $page
     * @param integer $Nbreligne
     * @return array
     */
    public function sqlListeOfAllUsers( int $page, int $Nbreligne)
    {

        $sql = $this->table('useraccount')
            ->limit((($page - 1) * $Nbreligne), $Nbreligne)
            ->orderby('typeusers', 'ASC')
            ->SQuery();

        $result = static::process()->select($sql, NULL, false);

        return $result;
    }

}
