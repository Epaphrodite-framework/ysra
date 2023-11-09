<?php

declare(strict_types=1);

namespace bin\database\query;

use bin\database\config\process\noSqldatabase;

trait NoSqlQueryChaines
{
    /**
     * @param null|int $db
     * @return mixed
     */
    public function db(?int $db = 1):mixed
    {
        return (new noSqldatabase)->GetConnexion($db);
    }
}
