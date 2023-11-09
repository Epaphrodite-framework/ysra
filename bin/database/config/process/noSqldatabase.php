<?php

namespace bin\database\config\process;

class noSqldatabase extends checkDatabase
{
    /**
     * Construct database connection 
     * @param int|1 $db
    */
    public function GetConnexion(?int $db = 1)
    {
        return $this->dbConnect($db);
    }

}