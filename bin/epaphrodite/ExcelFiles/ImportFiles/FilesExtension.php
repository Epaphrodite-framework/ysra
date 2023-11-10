<?php

namespace bin\epaphrodite\ExcelFiles\ImportFiles;

use bin\epaphrodite\define\config\traits\currentFunctionNamespaces;
use bin\epaphrodite\env\config\GeneralConfig;
use bin\epaphrodite\define\config\traits\currentStaticArray;

class FilesExtension
{

    use currentStaticArray , currentFunctionNamespaces;

    public static $config;

   /**
     * Determine the appropriate file extension and return the corresponding reader object.
     *
     * @param string $excelFile
     * 
     */
    protected function ExtenstionFiles( $ExcelFiles )
    {

        $Extension = (new GeneralConfig)->EndFiles($ExcelFiles , '.');

        if(in_array( $Extension, static::$AllExtensions)){

            static::$config = static::initConfig();

            switch ( $Extension ) 
            {
                case 'csv':

                    return static::$config['csv'];
                    break;

                case 'ods':

                    return static::$config['Ods'];
                    break;

                case 'xls':

                    return static::$config['xls'];
                    break;
                  
                default:

                return static::$config['xlsx'];
            }
        }else{return false;}
    }
}