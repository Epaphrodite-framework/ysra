<?php

declare(strict_types=1);

namespace epaphrodite\epaphrodite\CsrfToken;

use epaphrodite\database\query\Builders;
use epaphrodite\epaphrodite\CsrfToken\traits\sqlCrsfRequest;
use epaphrodite\epaphrodite\CsrfToken\traits\noSqlCrsfRequest;
use epaphrodite\epaphrodite\CsrfToken\contracts\validateTokenInterface;

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
