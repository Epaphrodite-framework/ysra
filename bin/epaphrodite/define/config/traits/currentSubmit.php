<?php

namespace epaphrodite\epaphrodite\define\config\traits;

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
     * Get the value from $_POST array for a given key with a default value.
     *
     * @param string $key The key to get.
     * @return mixed The value for the key in $_POST or an empty string if not set.
     */
    public static function getPost($key)
    {
        return static::noSpace($_POST[$key]) ?? '';
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

    /**
     * Get the value from $_GET array for a given key with a default value.
     *
     * @param string $key The key to get.
     * @return mixed The value for the key in $_GET or an empty string if not set.
     */
    public static function getGet($key)
    {
        return static::noSpace($_GET[$key]) ?? '';
    }

    /**
     * Cleans up spaces in a string by trimming leading and trailing spaces,
     * and normalizing internal spaces by replacing multiple spaces with a single space.
     *
     * @param string $datas The input string to be cleaned.
     * @return string The cleaned string.
     */
    private static function noSpace($datas)
    {
        // Trim leading and trailing spaces
        $string = trim($datas);

        // Normalize internal spaces (replace multiple spaces with a single space)
        $string = preg_replace('/\s+/', ' ', $string);

        return $string;
    }    
}
