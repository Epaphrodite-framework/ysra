<?php

namespace bin\epaphrodite\env\config;

use bin\database\datas\arrays\ApiStaticKeygen;

class GeneralConfig extends ApiStaticKeygen
{

    /**
     * @param mixed $Files
     * @param mixed $divid
     * @return string
     */
    public function EndFiles($Files, $divid)
    {

        $Files = explode($divid, $Files);

        return end($Files);
    }

    /**
     * @return string
     */
    public static function methods()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param string|null $key
     * @param string|null $values
     * @return void
     */
    public function SetSession(?string $key = null, ?string $values = null)
    {

        return $_SESSION[$key] = $values;
    }

    /**
     * @param string|null $key
     * @return void
     */
    public function GetSessions(?string $key = null)
    {

        return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
    }

    /**
     * @return string
     */
    public function GetFiles($key)
    {

        return $_FILES[array_keys($_FILES)[$key]]['tmp_name'];
    }

    public function FilesArray(): array
    {
        return array_keys($_FILES);
    }

    /**
     *  Execute python files content
     */
    public function pythonSystemCode($filePath, $Datas)
    {

        $filePath = $filePath . '.py';

        $Datas = !empty($Datas) ? $Datas : "";

        if (file_exists($filePath) === true) {
            
            $Output = shell_exec("python $filePath " . $Datas);
            
            echo $Output;
        } else {
            return "Sorry this file {$filePath} don't exist";
        }
    }
}
