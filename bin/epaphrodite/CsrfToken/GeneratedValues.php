<?php

namespace bin\epaphrodite\CsrfToken;

class GeneratedValues extends EncryptTokenValue
{
    /**
     * @return string
     */
    public function getvalue(): string
    {
        return $this->GenerateurTokenValues(70);
    }
}
