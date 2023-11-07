<?php

namespace bin\epaphrodite\define\config\traits;

trait currentStaticArray{

    /**
     * @return array
    */    
    protected static $EmailDomaine = ['gmail.com', 'yahoo.com', 'hotmail.com'];

    /**
     * @return array
    */
    protected static $AllExtensions = [ 'ods','csv','xls','xlsx' ];

    /**
     * @return array
    */
    protected static $FilesMimes = ['text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
}