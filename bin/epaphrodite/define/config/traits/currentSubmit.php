<?php

namespace bin\epaphrodite\define\config\traits;

trait currentSubmit
{
    /**
     * Check if a variable exists in the $_POST array.
     *
     * @param string $key The key to check.
     * @return bool True if the key exists in $_POST, false otherwise.
     */
    public static function isPost($key): bool
    {
        return isset($_POST[$key]);
    }

    /**
     * Check if a variable exists in the $_GET array.
     *
     * @param string $key The key to check.
     * @return bool True if the key exists in $_GET, false otherwise.
     */
    public static function isGet($key): bool
    {
        return isset($_GET[$key]);
    }
}
