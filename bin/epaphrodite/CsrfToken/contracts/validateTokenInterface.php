<?php

namespace epaphrodite\epaphrodite\CsrfToken\contracts;

interface validateTokenInterface {

    /**
     * Setter function csrf
     * @param string $key
     * @return bool|string|null
     */    
    public function get_csrf(?string $key = null);
}