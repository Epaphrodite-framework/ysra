<?php

namespace epaphrodite\epaphrodite\define\config\traits;

trait currentFunctionNamespaces
{

    /**
     * Initialize namespaces for different components
     * @return array
     */
    public static function initNamespace():array {

        return [
            'env' => new \epaphrodite\epaphrodite\env\env,
            'paths' => new \epaphrodite\epaphrodite\path\paths,
            'errors' => new \epaphrodite\controllers\render\errors,
            'datas' => new \epaphrodite\database\datas\arrays\datas,
            'global' => new \epaphrodite\epaphrodite\auth\HardSession,
            'mail' => new \epaphrodite\epaphrodite\api\email\SendMail,
            'crsf' => new \epaphrodite\epaphrodite\CsrfToken\token_csrf,
            'session' => new \epaphrodite\epaphrodite\auth\session_auth,
            'pdf' => new \epaphrodite\epaphrodite\share\makePdf\pdfStubs,
            'msg' => new \epaphrodite\epaphrodite\define\SetTextMessages,
            'secure' => new \epaphrodite\epaphrodite\CsrfToken\csrf_secure,
            'cookies' => new \epaphrodite\epaphrodite\auth\SetUsersCookies,
            'qrcode' => new \epaphrodite\epaphrodite\QRCodes\GenerateQRCode,
            'verify' => new \epaphrodite\epaphrodite\env\VerifyInputCharacteres,
            'layout' => new \epaphrodite\epaphrodite\EpaphMozart\Templates\LayoutsConfig,
            'eng' => new \epaphrodite\epaphrodite\define\lang\eng\SetEnglishTextMessages,
            'french' => new \epaphrodite\epaphrodite\define\lang\fr\SetFrenchTextMessages,
            'spanish' => new \epaphrodite\epaphrodite\define\lang\esp\SetSpanichTextMessages,
            'mozart' => new \epaphrodite\epaphrodite\EpaphMozart\ModulesConfig\SwitchersList,
        ];
    }

    /**
     * Initialize configuration for various components
     * @return array
     */
    public static function initConfig():array {

        return [
            'qrcode' => new \chillerlan\QRCode\QRCode,
            'auth' => new \epaphrodite\epaphrodite\danho\DanhoAuth,
            'qroptions' => new \chillerlan\QRCode\QROptions,         
            'csv' => new \PhpOffice\PhpSpreadsheet\Reader\Csv,            
            'Ods' => new \PhpOffice\PhpSpreadsheet\Reader\Ods,
            'xls' => new \PhpOffice\PhpSpreadsheet\Reader\Xls,
            'xlsx' => new \PhpOffice\PhpSpreadsheet\Reader\Xlsx,
            'guard' => new \epaphrodite\epaphrodite\danho\GuardPassword,
            'addright' => new \epaphrodite\epaphrodite\yedidiah\AddRights,
            'process' => new \epaphrodite\database\config\process\process,
            'crsf' => new \epaphrodite\epaphrodite\CsrfToken\validate_token,
            'updright' => new \epaphrodite\epaphrodite\yedidiah\UpdateRights,
            'setting' => new \epaphrodite\epaphrodite\auth\SetSessionSetting,
            'session' => new \epaphrodite\epaphrodite\env\config\GeneralConfig,            
            'seeder' => new \epaphrodite\database\config\process\checkDatabase,
            'delright' => new \epaphrodite\epaphrodite\yedidiah\YedidiaDeleted,
            'listright' => new \epaphrodite\epaphrodite\yedidiah\YedidiaGetRights,
            'python' => new \epaphrodite\epaphrodite\translate\PythonCodesTranslate,
            'extension' => new \epaphrodite\epaphrodite\Extension\EpaphroditeExtension,
        ];
    }

    /**
     * Initialize query components
     * @return array
     */
    public static function initQuery():array {

        return [
            'auth' => new \epaphrodite\database\requests\mainRequest\select\auth,
            'count' => new \epaphrodite\database\requests\mainRequest\select\count,
            'param' => new \epaphrodite\database\requests\mainRequest\select\param,
            'getid' => new \epaphrodite\database\requests\mainRequest\select\get_id,
            'delete' => new \epaphrodite\database\requests\mainRequest\delete\delete,
            'update' => new \epaphrodite\database\requests\mainRequest\update\update,
            'insert' => new \epaphrodite\database\requests\mainRequest\insert\insert,
            'select' => new \epaphrodite\database\requests\mainRequest\select\select,
            'general' => new \epaphrodite\database\requests\mainRequest\select\general,
            'setting' => new \epaphrodite\database\requests\typeRequest\sqlRequest\insert\setting,
        ];
    }  
    
    /**
     * Check if the retrieved value is an object; if not, return a stdClass instance
     * @param string $key
     * @param array $config
     * @return object
     */
    public function getFunctionObject(array $config, string $key): object {
        
        return is_object( $config[$key] ?? null) ? $config[$key] : new \stdClass();
    }      
}