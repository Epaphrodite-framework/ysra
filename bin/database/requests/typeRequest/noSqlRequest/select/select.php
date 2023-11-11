<?php

namespace bin\database\requests\typeRequest\noSqlRequest\select;

use bin\database\query\Builders;

class select extends Builders
{

    /**
     * Afficher la liste des utilisateurs
     *
     * @param integer $page
     * @param integer $Nbreligne
     * @return array
     */
    public function noSqlListeOfAllUsers( $page, int $Nbreligne):array
    {

        $documents =[];

        $result = $this->db(1)
            ->selectCollection('useraccount')
            ->find([] , ['limit' => $Nbreligne , 'skip' => ($page -1)] );

        foreach ($result as $document) {
            $documents []= $document;
        }
        
        return $documents;        
    }    
}
