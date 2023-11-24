<?php

namespace epaphrodite\database\requests\typeRequest\noSqlRequest\select;

use epaphrodite\database\query\Builders;

class get_id extends Builders
{

    /**
     * Afficher la liste des utilisateurs
     *
     * @param integer $page
     * @param integer $Nbreligne
     * @param integer $UsersGroup
     * @return array
     */
    public function noSqlGetUsersByGroup(int $page, int $Nbreligne, int $UsersGroup):array
    {

        $documents = [];

        $result = $this->db(1)
            ->selectCollection('useraccount')
            ->find(['typeusers' => $UsersGroup], [
                'limit' => $Nbreligne, 'skip' => ($page-1),
            ]);

        foreach ($result as $document) {
            $documents[] = $document;
        }
        return $documents;
    }

    /** 
     * Request to select users by login
     *
     * @param string|null $login
     * @return array
     */    
    public function noSqlGetUsersDatas(?string $login = null)
    {

        $documents = [];

        $result = $this->db(1)
            ->selectCollection('useraccount')
            ->find(['loginusers' => $login]);

        foreach ($result as $document) {
            $documents[] = $document;
        }

        return $documents;
    }

    /** 
     * Request to select authsecure by login
     *
     * @param string|null $login
     * @return array
     */
    public function noSqlGetUsersLastConnexion(?string $login = null)
    {

        $documents = [];

        $result = $this->db(1)
            ->selectCollection('authsecure')
            ->find(['crsfauth' => md5($login)]);

        foreach ($result as $document) {
            $documents[] = $document;
        }

        return !empty($documents) ? $documents[0]['createat'] : NULL;
    }    
}
