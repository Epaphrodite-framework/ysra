<?php

namespace bin\epaphrodite\EpaphMozart\ModulesConfig\Lists;

use bin\epaphrodite\constant\epaphroditeClass;

class GetRightList extends epaphroditeClass
{

   public static function RightList()
   {

      return [
         [
            'apps' => 'profil',
            'libelle' => "Change password",
            'path' => 'users/change_password'
         ],
         [
            'apps' => 'profil',
            'libelle' => "Change my informations",
            'path' => 'users/edit_users_infos'
         ],
         [
            'apps' => 'users',
            'libelle' => 'Users list',
            'path' => 'users/all_users_list',
         ],
         [
            'apps' => 'users',
            'libelle' => 'Import Users',
            'path' => 'users/import_users',
         ],         
        ];
        
    }
 }