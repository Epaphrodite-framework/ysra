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
            'path' => 'users/modifier_mot_de_passe'
         ],
         [
            'apps' => 'profil',
            'libelle' => "Change my informations",
            'path' => 'users/modifier_infos_users'
         ],
         [
            'apps' => 'users',
            'libelle' => 'Users list',
            'path' => 'users/liste_des_utilisateurs',
         ],
        ];
        
    }
 }