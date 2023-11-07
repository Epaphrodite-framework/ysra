<?php

namespace bin\database\query;

use bin\database\config\process\noSqldatabase;

trait NoSqlQueryChaines
{

    public function db($db){
        return (new noSqldatabase)->GetConnexion($db);
    }
}
