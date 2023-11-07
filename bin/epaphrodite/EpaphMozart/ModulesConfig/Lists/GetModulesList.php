<?php

namespace bin\epaphrodite\EpaphMozart\ModulesConfig\Lists;

use bin\epaphrodite\EpaphMozart\ModulesConfig\RighstList;

class GetModulesList extends RighstList
{

    public static function GetModuleList(){

        return [
            'profil' => 'MY PROFILS',
            'search' => 'SEARCH',
            'print' => 'PRINT MANAGEMENT',  
            'import' => 'IMPORT MANAGEMENT',
            'export' => 'EXPORT MANAGEMENT',
            'statistic' => 'STATICS MANAGEMENT',
            'annuaire' => 'DIRECTORY MANAGEMENT',
            'habilit' => 'AUTHORIZATIONS',
            'faq' => 'FAQ (Frequently Asked Questions)',
            'chats' => 'CHATS MESSAGES',
            'users' => 'USERS MANAGEMENT',
            'setting' => 'SYSTEM SETTING',
        ];

     } 
 }