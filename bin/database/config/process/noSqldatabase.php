<?php

namespace bin\database\config\process;

class noSqldatabase extends checkDatabase
{
    /**
     * Construct database connection 
     * @param int $db
    */
    public function GetConnexion(int $db)
    {
        return $this->dbConnect($db);
    }

}