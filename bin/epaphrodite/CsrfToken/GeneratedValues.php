<?php

namespace epaphrodite\epaphrodite\CsrfToken;

use epaphrodite\epaphrodite\CsrfToken\encryptToken\encryptTokenValue;

class GeneratedValues extends encryptTokenValue
{
    
    /**
     * @return string
     */
    public function getvalue(): string
    {
        return $this->GenerateurTokenValues(70);
    }
}
