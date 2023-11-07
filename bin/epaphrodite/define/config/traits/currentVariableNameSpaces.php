<?php

namespace bin\epaphrodite\define\config\traits;

trait currentVariableNameSpaces
{

    /**
     * Configuration for different file formats and their corresponding classes
     * @var string[] $initExcelSetting
     * @return array
     */
    public static $initExcelSetting = 
    [
        'Ods' => \PhpOffice\PhpSpreadsheet\Reader\Ods::class,
        'xls' => \PhpOffice\PhpSpreadsheet\Reader\Xls::class,
        'csv' => \PhpOffice\PhpSpreadsheet\Reader\Csv::class,
        'xlsx' => \PhpOffice\PhpSpreadsheet\Reader\Xlsx::class,
    ];

    /**
     * Configuration for different languages and their corresponding text message classes
     * @var string[] $initMessageCode
     * @return array
     */ 
    public static $initMessageCode = 
    [
        'eng' => \bin\epaphrodite\define\lang\eng\SetEnglishTextMessages::class,
        'french' => \bin\epaphrodite\define\lang\fr\SetFrenchTextMessages::class,
    ];

    /**
     * @var string[] $initNamespace
     * @return array
    */     
    protected static $initNamespace =
    [
        'env' => \bin\epaphrodite\env\env::class,
        'paths' => \bin\epaphrodite\path\paths::class,
        'errors' => \bin\controllers\render\errors::class,
        'datas' => \bin\database\datas\arrays\datas::class,
        'global' => \bin\epaphrodite\auth\HardSession::class,
        'mail' => \bin\epaphrodite\api\email\SendMail::class,
        'crsf' => \bin\epaphrodite\CsrfToken\token_csrf::class,
        'session' => \bin\epaphrodite\auth\session_auth::class,
        'pdf' => \bin\epaphrodite\share\makePdf\pdfStubs::class,
        'msg' => \bin\epaphrodite\define\SetTextMessages::class,
        'secure' => \bin\epaphrodite\CsrfToken\csrf_secure::class,
        'cookies' => \bin\epaphrodite\auth\SetUsersCookies::class,
        'qrcode' => \bin\epaphrodite\QRCodes\GenerateQRCode::class,
        'verify' => \bin\epaphrodite\env\VerifyInputCharacteres::class,
        'layout' => \bin\epaphrodite\EpaphMozart\Templates\LayoutsConfig::class,
        'mozart' => \bin\epaphrodite\EpaphMozart\ModulesConfig\SwitchersList::class,
    ];  

    /**
     * @var string[] $initDatabaseConfig
     * @return array
    */     
    protected static $initDatabaseConfig =
    [
        'builders' => \bin\database\query\Builders::class,
        'process' => \bin\database\config\process\process::class,
        'seeder' => \bin\database\config\process\checkDatabase::class,
    ];

    /**
     * @var string[] $initGuardsConfig
     * @return array
    */     
    public static $initGuardsConfig =
    [
        'auth' => \bin\epaphrodite\danho\DanhoAuth::class,
        'guard' => \bin\epaphrodite\danho\GuardPassword::class,
        'session' => \bin\epaphrodite\env\config\GeneralConfig::class,
        'sql' => \bin\database\requests\mainRequest\select\auth::class,
    ];

    /**
     * @var string[] $initRightsConfig
     * @return array
    */     
    public static $initRightsConfig =
    [
        'update' => \bin\epaphrodite\yedidiah\UpdateRights::class,
        'delete' => \bin\epaphrodite\yedidiah\YedidiaDeleted::class,
    ];    

    /**
     * @var string[] $initQrCodesConfig
     * @return array
    */     
    public static $initQrCodesConfig =
    [
        'qrcode' => \chillerlan\QRCode\QRCode::class,
        'qroptions' => \chillerlan\QRCode\QROptions::class,
    ]; 

    /**
     * @var string[] $initQueryConfig
     * @return array
    */     
    public static $initQueryConfig =
    [
        'count' => \bin\database\requests\mainRequest\select\count::class,
        'param' => \bin\database\requests\mainRequest\select\param::class,
        'getid' => \bin\database\requests\mainRequest\select\get_id::class,
        'delete' => \bin\database\requests\mainRequest\delete\delete::class,
        'update' => \bin\database\requests\mainRequest\update\update::class,
        'insert' => \bin\database\requests\mainRequest\insert\insert::class,
        'select' => \bin\database\requests\mainRequest\select\select::class,
        'general' => \bin\database\requests\mainRequest\select\general::class,
    ];     
    
    /**
     * @var string[] $initAuthConfig
     * @return array
    */      
    public static $initAuthConfig =
    [
        'setting' => \bin\epaphrodite\auth\SetSessionSetting::class,
    ];

    /**
     * Configuration for Twig
     * @var string[] $initTwigConfig
     * @return array
     */    
    public static $initTwigConfig =
    [
        'extension' => \bin\epaphrodite\Extension\EpaphroditeExtension::class,
    ]; 
}