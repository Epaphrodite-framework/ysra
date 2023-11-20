<?php

declare(strict_types=1);

namespace bin\epaphrodite\CsrfToken;

use bin\database\query\Builders;
use bin\epaphrodite\CsrfToken\contracts\validateTokenInterface;
use bin\epaphrodite\CsrfToken\traits\sqlCrsfRequest;
use bin\epaphrodite\CsrfToken\traits\noSqlCrsfRequest;

class csrf_secure extends Builders implements validateTokenInterface
{
    public $getCrsf;

    use sqlCrsfRequest, noSqlCrsfRequest;

    /**
     * Get rooting csrf 
     * @param string $key
     * @return bool|string|null
     */
    private function getTokenCrsf(?string $key = null):bool|string|null
    {
        if(_DATABASE_ === 'sql'){

            return empty($this->secure()) ? $this->CreateUserCrsfToken($key) : $this->UpdateUserCrsfToken($key);
        }else{
            
            return empty($this->noSqlSecure()) ? $this->noSqlCreateUserCrsfToken($key) : $this->noSqlUpdateUserCrsfToken($key);
        }
    }

    /**
     * Setter function csrf
     * @param string $key
     * @return bool|string|null
     */
    public function get_csrf(?string $key = null){

        $this->getCrsf = $this->getTokenCrsf($key);

        return $this->getCrsf;
    }

}
