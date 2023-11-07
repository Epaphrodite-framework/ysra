<?php

namespace bin\epaphrodite\ExcelFiles\ImportFiles;

use bin\epaphrodite\env\config\GeneralConfig;
use bin\epaphrodite\define\config\traits\currentStaticArray;
use bin\epaphrodite\define\config\traits\currentVariableNameSpaces;

class FilesExtension
{

    use currentVariableNameSpaces, currentStaticArray;

    private object $Xlsx;
    private object $Xls;
    private object $Csv;
    private object $Ods;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->Ods = new static::$initExcelSetting['Ods'];
        $this->Csv = new static::$initExcelSetting['csv'];
        $this->Xls = new static::$initExcelSetting['xls'];
        $this->Xlsx = new static::$initExcelSetting['xlsx'];
    }

    /**
     * @param mixed $ExcelFiles
     * @return \PhpOffice\PhpSpreadsheet\Reader\Csv|\PhpOffice\PhpSpreadsheet\Reader\Xls|\PhpOffice\PhpSpreadsheet\Reader\Xlsx\PhpOffice\PhpSpreadsheet\Reader\Ods
    */
    protected function ExtenstionFiles( $ExcelFiles ){

        $Extension = (new GeneralConfig)->EndFiles($ExcelFiles , '.');

        if(in_array( $Extension, static::$AllExtensions)){

            switch ( $Extension ) 
            {
                case $Extension === 'csv':
                    return $this->Csv;
                    break;

                case $Extension === 'ods':
                    return $this->Ods;
                    break;

                case $Extension === 'xls':
                    return $this->Xls;
                    break;
                  
                default:
                return $this->Xlsx;
            }
        }else{return false;}
    }
}