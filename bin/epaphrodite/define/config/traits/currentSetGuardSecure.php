<?php

namespace bin\epaphrodite\define\config\traits;

trait currentSetGuardSecure
{

    /**
     * First Hash method
     */
    protected static $Algorithm = PASSWORD_DEFAULT;

    /**
     * Second Hash method
     */    
    protected static $Gost = 'gost';


    protected static $Openssl = 'AES-256-CBC';


    protected static $GuardKeys = '5v5Hd+vXmx8fkm4VOr8mm0NiQnU2d1Q2SGdMRW9yUzZXRytGcWc9PQ==';

    /**
     * Latter for security crypt
     */    
    protected static $Guardlatters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

}