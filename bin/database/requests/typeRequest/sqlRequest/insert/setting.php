<?php

namespace bin\database\requests\typeRequest\sqlRequest\insert;

use bin\database\query\Builders;

class setting extends Builders
{

    /**
     * Enregistrer les actions recentes
     * 
     * @param string|null $action
     * @return bool
     */
    public function ActionsRecente(?string $action = null)
    {

        $sql = $this->table('recentactions ')
            ->insert('usersactions , dateactions , libactions')
            ->values(' ? , ? , ? ')
            ->IQuery();

        static::process()->insert($sql, [static::initNamespace()['session']->login(), date("Y-m-d H:i:s"), $action], true);

        return true;
    }

    /**
     * Enregistrer les actions recentes
     * 
     * @param string|null $action
     * @return bool
     */
    public function noSqlActionsRecente(?string $action = null)
    {

        $document =
            [
                'usersactions' => static::initNamespace()['session']->login(),
                'dateactions' => date("Y-m-d H:i:s"),
                'libactions' => $action,
            ];

        $this->db(1)->selectCollection('recentactions')->insertOne($document);

        return true;
    }
}
