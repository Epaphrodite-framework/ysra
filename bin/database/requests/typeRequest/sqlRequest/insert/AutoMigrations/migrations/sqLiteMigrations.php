<?php

namespace Epaphrodite\database\requests\typeRequest\sqlRequest\insert\AutoMigrations\migrations;

trait sqLiteMigrations{
    
    /**
     * Create user if not exist
     */
    private function CreateSqLiteUserIfNotExist()
    {

        $this->chaine("CREATE TABLE IF NOT EXISTS useraccount (
            idusers INTEGER PRIMARY KEY,
            loginusers TEXT NOT NULL,
            userspwd TEXT NOT NULL,
            nomprenomsusers TEXT DEFAULT NULL,
            contactusers TEXT DEFAULT NULL,
            emailusers TEXT DEFAULT NULL,
            typeusers INTEGER NOT NULL DEFAULT 1,
            usersstat INTEGER NOT NULL DEFAULT 1
        )")->setQuery();

        $this->chaine("CREATE INDEX IF NOT EXISTS loginusers ON useraccount (loginusers)")->setQuery();
    }

    /**
     * Create recently users actions if not exist
     */
    private function createRecentlyActionsSqLiteIfNotExist()
    {

        $this->chaine("CREATE TABLE IF NOT EXISTS 
            recentactions (idrecentactions SERIAL PRIMARY KEY , 
            usersactions varchar(20)NOT NULL , 
            dateactions TIMESTAMP , 
            libactions varchar(300)NOT NULL )")->setQuery();

        $this->chaine("CREATE INDEX 
                  usersactions ON recentactions (usersactions)")->setQuery();
    }

    /**
     * Create auth_secure if not exist
     */
    private function CreateAuthSecureSqLiteIfNotExist()
    {

        $this->chaine("CREATE TABLE IF NOT EXISTS 
            authsecure (idtokensecure SERIAL PRIMARY KEY , 
            crsfauth varchar(300)NOT NULL , 
            authkey varchar(200) NOT NULL , 
            createat TIMESTAMP )")->setQuery();

        $this->chaine("CREATE INDEX 
                  crsfauth ON authsecure (crsfauth)")->setQuery();
    }

    /**
     * Create messages if not exist
     */
    private function CreateChatMessagesSqLiteIfNotExist()
    {

        $this->chaine("CREATE TABLE IF NOT EXISTS 
            chatsmessages (idchatsmessages SERIAL PRIMARY KEY , 
            emetteur varchar(20)NOT NULL , 
            destinataire varchar(20) NOT NULL , 
            typemessages int NOT NULL , 
            contentmessages varchar(500) NOT NULL , 
            datemessages TIMESTAMP , 
            etatmessages int NOT NULL)")->setQuery();

        $this->chaine("CREATE INDEX 
                    emetteur ON chatsmessages (emetteur)")->setQuery();

        $this->chaine("CREATE INDEX 
                    destinataire ON chatsmessages (destinataire)")->setQuery();
    }

}