<?php

namespace Epaphrodite\epaphrodite\define\config\traits;

trait currentSubmit
{
    /**
     * Check if a variable exists in the $_POST array.
     *
     * @param string $key The key to check.
     * @return bool True if the key exists in $_POST, false otherwise.
     */
    public static function isPost($key): array|bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST[$key] ?? null) !== null;
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
        return isset($_GET[$key]) && $_GET[$key] !== '';
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
     * Process data from a specified method and key, converting elements to integers if they exist.
     * Uses nullsafe operator and match expression introduced in PHP 8.1.
     *
     * @param string $method The method to retrieve data from (default is 'POST').
     * @param string $key    The key of the data to be processed.
     *
     * @return array Processed array with integer elements or an empty array.
     */
    public static function isArray(string $key, string $method = 'POST'): array
    {
        // Retrieve data based on the specified method and key
        $data = match (strtoupper($method)) {
            'GET' => $_GET[$key] ?? null,
            'POST' => $_POST[$key] ?? null,
            default => null,
        };

    // Check if the retrieved data exists
    if (is_array($data)) {
        // Convert elements to integers if they exist
        return array_map('intval', $data);
    }

    // Return the entire data retrieved or an empty array if it doesn't exist
    return is_array($data) ? $data : [];
    }

    /**
     * Checks if specific keys in a given method's data (GET or POST) are not empty.
     *
     * @param string $method The method to check (either 'GET' or 'POST').
     * @param array $keys An array containing keys to check in the data source.
     *
     * @return bool Returns true if all specified keys exist and are not empty in the data source, otherwise false.
     */
    public static function notEmpty(array $keys = [], string $method = 'POST'): bool
    {
        // Determine the data source based on the method (GET or POST)
        $source = match ($method) {
            'GET' => $_GET,
            'POST' => $_POST,
            default => [], // If method is neither GET nor POST, set an empty array
        };

        // If the data source is empty, return false
        if (empty($source)) {
            return false;
        }

        // Check if each specified key exists in the data source and is not empty
        foreach ($keys as $key) {
            // If the key doesn't exist or the corresponding value is empty, return false
            if (!array_key_exists($key, $source) || empty($source[$key])) {
                return false;
            }
        }

        // If all specified keys exist and are not empty, return true
        return true;
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
        // Convert to string if it's not already a string
        $datas = is_string($datas) ? $datas : strval($datas);

        // Trim leading and trailing spaces
        $string = trim($datas);

        // Normalize internal spaces (replace multiple spaces with a single space)
        $string = preg_replace('/\s+/', ' ', $string);

        return $string;
    }
}
