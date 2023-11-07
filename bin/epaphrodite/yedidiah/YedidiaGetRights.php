<?php

namespace bin\epaphrodite\yedidiah;

use bin\epaphrodite\constant\epaphroditeClass;

class YedidiaGetRights extends epaphroditeClass{

     /** 
     * Request to select user right by module and 
     * 
     * @param string|null $module
     */
    public function modules(?string $module = null)
    {
        $result = false;
        $index = $module . ',' . static::class('session')->type();

        $json_arr = json_decode(file_get_contents(static::JsonDatas()), true);

        foreach ($json_arr as $key => $value) {
            if ($value['IndexModule'] == $index) {
                $result = true;
            }
        }

        return $result;
    }

    /**
     * Request to select user right by user type
     */
    public function users_rights($idtype_user)
    {

        $result = [];
        $json_arr = json_decode(file_get_contents(static::JsonDatas()), true);

        foreach ($json_arr as $key => $value) {
            if ($value['IdtypeUserRights'] == $idtype_user) {
                $result[] = $json_arr[$key];
            }
        }

        return $result;
    }

    /**  
     * Request to select user right by user type
     * @param string|null $key
     * @return array
     */
    public function liste_menu(?string $key = null)
    {

        $result = [];
        $index = $key . ',' . static::class('session')->type();

        $json_arr = json_decode(file_get_contents(static::JsonDatas()), true);

        foreach ($json_arr as $key => $value) {
            if ($value['IndexModule'] === $index) {
                $result[] = $json_arr[$key];
            }
        }

        return $result;
    }


}