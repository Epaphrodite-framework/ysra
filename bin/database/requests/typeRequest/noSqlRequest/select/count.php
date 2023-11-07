<?php

namespace bin\database\requests\typeRequest\noSqlRequest\select;

use bin\database\query\Builders;

class count extends Builders
{

   /**
    * Request to create 
    */ 
    public function noSqlchatMessages()
    {

        $login = static::initNamespace()['session']->login();

        $result = $this->db(1)
            ->selectCollection('chatsmessages')
            ->countDocuments(['destinataire' => $login, 'etatmessages' => 1]);

        return $result;
    }

    /**
     * Get total number of user bd
     * @return int
     */
    public function noSqlCountAllUsers()
    {
        $result = $this->db(1)
            ->selectCollection('useraccount')
            ->countDocuments([]);

        return $result;
    }

    /** 
     * Get total number of user bd
     * @return int
     */
    public function noSqlCountUsersByGroup($Group)
    {

        $result = $this->db(1)
            ->selectCollection('useraccount')
            ->countDocuments(['typeusers' => $Group]);

        return $result;
    }
}
