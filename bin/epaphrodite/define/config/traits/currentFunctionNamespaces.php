<?php

namespace bin\epaphrodite\define\config\traits;

trait currentFunctionNamespaces
{

    /**
     * Initialize namespaces for different components
     * @return array
     */
    public static function initNamespace():array {

        return [
            'env' => new \bin\epaphrodite\env\env,
            'paths' => new \bin\epaphrodite\path\paths,
            'errors' => new \bin\controllers\render\errors,
            'datas' => new \bin\database\datas\arrays\datas,
            'global' => new \bin\epaphrodite\auth\HardSession,
            'mail' => new \bin\epaphrodite\api\email\SendMail,
            'crsf' => new \bin\epaphrodite\CsrfToken\token_csrf,
            'session' => new \bin\epaphrodite\auth\session_auth,
            'pdf' => new \bin\epaphrodite\share\makePdf\pdfStubs,
            'msg' => new \bin\epaphrodite\define\SetTextMessages,
            'secure' => new \bin\epaphrodite\CsrfToken\csrf_secure,
            'cookies' => new \bin\epaphrodite\auth\SetUsersCookies,
            'qrcode' => new \bin\epaphrodite\QRCodes\GenerateQRCode,
            'verify' => new \bin\epaphrodite\env\VerifyInputCharacteres,
            'layout' => new \bin\epaphrodite\EpaphMozart\Templates\LayoutsConfig,
            'eng' => new \bin\epaphrodite\define\lang\eng\SetEnglishTextMessages,
            'french' => new \bin\epaphrodite\define\lang\fr\SetFrenchTextMessages,
            'spanish' => new \bin\epaphrodite\define\lang\esp\SetSpanichTextMessages,
            'mozart' => new \bin\epaphrodite\EpaphMozart\ModulesConfig\SwitchersList,
        ];
    }

    /**
     * Initialize configuration for various components
     * @return array
     */
    public static function initConfig():array {

        return [
            'qrcode' => new \chillerlan\QRCode\QRCode,
            'auth' => new \bin\epaphrodite\danho\DanhoAuth,
            'qroptions' => new \chillerlan\QRCode\QROptions,         
            'csv' => new \PhpOffice\PhpSpreadsheet\Reader\Csv,            
            'Ods' => new \PhpOffice\PhpSpreadsheet\Reader\Ods,
            'xls' => new \PhpOffice\PhpSpreadsheet\Reader\Xls,
            'xlsx' => new \PhpOffice\PhpSpreadsheet\Reader\Xlsx,
            'guard' => new \bin\epaphrodite\danho\GuardPassword,
            'addright' => new \bin\epaphrodite\yedidiah\AddRights,
            'process' => new \bin\database\config\process\process,
            'crsf' => new \bin\epaphrodite\CsrfToken\validate_token,
            'updright' => new \bin\epaphrodite\yedidiah\UpdateRights,
            'setting' => new \bin\epaphrodite\auth\SetSessionSetting,
            'session' => new \bin\epaphrodite\env\config\GeneralConfig,            
            'seeder' => new \bin\database\config\process\checkDatabase,
            'delright' => new \bin\epaphrodite\yedidiah\YedidiaDeleted,
            'listright' => new \bin\epaphrodite\yedidiah\YedidiaGetRights,
            'python' => new \bin\epaphrodite\translate\PythonCodesTranslate,
            'extension' => new \bin\epaphrodite\Extension\EpaphroditeExtension,
        ];
    }

    /**
     * Initialize query components
     * @return array
     */

    public static function initQuery():array {

        return [
            'auth' => new \bin\database\requests\mainRequest\select\auth,
            'count' => new \bin\database\requests\mainRequest\select\count,
            'param' => new \bin\database\requests\mainRequest\select\param,
            'getid' => new \bin\database\requests\mainRequest\select\get_id,
            'delete' => new \bin\database\requests\mainRequest\delete\delete,
            'update' => new \bin\database\requests\mainRequest\update\update,
            'insert' => new \bin\database\requests\mainRequest\insert\insert,
            'select' => new \bin\database\requests\mainRequest\select\select,
            'general' => new \bin\database\requests\mainRequest\select\general,
            'setting' => new \bin\database\requests\typeRequest\sqlRequest\insert\setting,
        ];
    }    
}