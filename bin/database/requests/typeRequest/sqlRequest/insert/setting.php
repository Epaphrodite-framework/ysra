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
    public function ActionsRecente(?string $action = null):bool
    {

        $this->table('recentactions ')
            ->insert('usersactions , dateactions , libactions')
            ->values(' ? , ? , ? ')
            ->param([static::initNamespace()['session']->login(), date("Y-m-d H:i:s"), $action])
            ->IQuery();

        return true;
    }

    /**
     * Enregistrer les actions recentes
     * 
     * @param string|null $action
     * @return bool
     */
    public function noSqlActionsRecente(?string $action = null):bool
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
