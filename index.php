<?php

/*
    |--------------------------------------------------------------------------
    | Run main directory containt which first Config
    |--------------------------------------------------------------------------
*/   
    require 'bin/epaphrodite/define/config/SetDirectory.php';

/*
    |--------------------------------------------------------------------------
    | Run autoloader of composer
    |--------------------------------------------------------------------------
*/ 
    require _DIR_VENDOR_.'/autoload.php';
   
/*
    |--------------------------------------------------------------------------
    | Run App
    |--------------------------------------------------------------------------
*/ 
    Epaphrodite\controllers\render\buildEpaphroditeApp::Run();