<?php

namespace Epaphrodite\epaphrodite\yedidiah;

use Epaphrodite\epaphrodite\constant\epaphroditeClass;

class YedidiaGetRights extends epaphroditeClass{

    /**
     * Request to select user right by module and user type.
     *
     * @param string|null $module
     * @return bool
     */
    public function modules(?string $module = null): bool
    {
        $result = false;
        $index = $module . ',' . static::class('session')->type();

        $json_arr = json_decode(file_get_contents(static::JsonDatas()), true);

        foreach ($json_arr as $key => $value) {
            if ($value['IndexModule'] == $index) {
                $result = true;
                break;
            }
        }

        return $result;
    }

   /**
     * Request to select user rights by user type.
     *
     * @param int $idtypeUser
     * @return array
     */
    public function users_rights($idtype_user): array
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
     * Request to select user rights by user type and key.
     *
     * @param string|null $key
     * @return array
     */
    public function liste_menu(?string $key = null): array
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