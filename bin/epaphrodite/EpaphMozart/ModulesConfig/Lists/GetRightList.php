<?php

namespace epaphrodite\epaphrodite\EpaphMozart\ModulesConfig\Lists;

use epaphrodite\epaphrodite\constant\epaphroditeClass;

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
            'libelle' => 'Import Users',
            'path' => 'users/import_users',
         ], 
         [
            'apps' => 'users',
            'libelle' => 'List of all Users',
            'path' => 'users/all_users_list',
         ],                 
        ];
        
    }
 }