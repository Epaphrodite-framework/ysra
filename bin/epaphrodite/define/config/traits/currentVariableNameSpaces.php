<?php

namespace epaphrodite\epaphrodite\define\config\traits;

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
        'eng' => \epaphrodite\epaphrodite\define\lang\eng\SetEnglishTextMessages::class,
        'french' => \epaphrodite\epaphrodite\define\lang\fr\SetFrenchTextMessages::class,
    ];

    /**
     * @var string[] $initNamespace
     * @return array
    */     
    protected static $initNamespace =
    [
        'env' => \epaphrodite\epaphrodite\env\env::class,
        'paths' => \epaphrodite\epaphrodite\path\paths::class,
        'errors' => \epaphrodite\controllers\render\errors::class,
        'datas' => \epaphrodite\database\datas\arrays\datas::class,
        'global' => \epaphrodite\epaphrodite\auth\HardSession::class,
        'mail' => \epaphrodite\epaphrodite\api\email\SendMail::class,
        'crsf' => \epaphrodite\epaphrodite\CsrfToken\token_csrf::class,
        'session' => \epaphrodite\epaphrodite\auth\session_auth::class,
        'pdf' => \epaphrodite\epaphrodite\share\makePdf\pdfStubs::class,
        'msg' => \epaphrodite\epaphrodite\define\SetTextMessages::class,
        'secure' => \epaphrodite\epaphrodite\CsrfToken\csrf_secure::class,
        'cookies' => \epaphrodite\epaphrodite\auth\SetUsersCookies::class,
        'qrcode' => \epaphrodite\epaphrodite\QRCodes\GenerateQRCode::class,
        'verify' => \epaphrodite\epaphrodite\env\VerifyInputCharacteres::class,
        'layout' => \epaphrodite\epaphrodite\EpaphMozart\Templates\LayoutsConfig::class,
        'mozart' => \epaphrodite\epaphrodite\EpaphMozart\ModulesConfig\SwitchersList::class,
    ];  

    /**
     * @var string[] $initDatabaseConfig
     * @return array
    */     
    protected static $initDatabaseConfig =
    [
        'builders' => \epaphrodite\database\query\Builders::class,
        'process' => \epaphrodite\database\config\process\process::class,
        'seeder' => \epaphrodite\database\config\process\checkDatabase::class,
    ];

    /**
     * @var string[] $initGuardsConfig
     * @return array
    */     
    public static $initGuardsConfig =
    [
        'auth' => \epaphrodite\epaphrodite\danho\DanhoAuth::class,
        'guard' => \epaphrodite\epaphrodite\danho\GuardPassword::class,
        'session' => \epaphrodite\epaphrodite\env\config\GeneralConfig::class,
        'sql' => \epaphrodite\database\requests\mainRequest\select\auth::class,
    ];

    /**
     * @var string[] $initRightsConfig
     * @return array
    */     
    public static $initRightsConfig =
    [
        'update' => \epaphrodite\epaphrodite\yedidiah\UpdateRights::class,
        'delete' => \epaphrodite\epaphrodite\yedidiah\YedidiaDeleted::class,
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
        'count' => \epaphrodite\database\requests\mainRequest\select\count::class,
        'param' => \epaphrodite\database\requests\mainRequest\select\param::class,
        'getid' => \epaphrodite\database\requests\mainRequest\select\get_id::class,
        'delete' => \epaphrodite\database\requests\mainRequest\delete\delete::class,
        'update' => \epaphrodite\database\requests\mainRequest\update\update::class,
        'insert' => \epaphrodite\database\requests\mainRequest\insert\insert::class,
        'select' => \epaphrodite\database\requests\mainRequest\select\select::class,
        'general' => \epaphrodite\database\requests\mainRequest\select\general::class,
    ];     
    
    /**
     * @var string[] $initAuthConfig
     * @return array
    */      
    public static $initAuthConfig =
    [
        'setting' => \epaphrodite\epaphrodite\auth\SetSessionSetting::class,
    ];

    /**
     * Configuration for Twig
     * @var string[] $initTwigConfig
     * @return array
     */    
    public static $initTwigConfig =
    [
        'extension' => \epaphrodite\epaphrodite\Extension\EpaphroditeExtension::class,
    ]; 

    /**
     * Check if the retrieved value is an object; if not, return a stdClass instance
     * @param string $key
     * @param array $config
     * @return object
     */
    public function getObject(array $config, string $key): object {
        
        return is_object( new $config[$key] ?? null) ? new $config[$key] : new \stdClass();
    }      
}