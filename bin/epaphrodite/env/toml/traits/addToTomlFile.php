<?php

namespace bin\epaphrodite\env\toml\traits;

use Yosymfony\Toml\TomlBuilder;

trait AddToTomlFile{

    public function readTomlFile() {

        $filePath = _DIR_TOML_DATAS_ . "1tomlDatas.toml";

        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        }
        return '';
    }
    
    public function writeTomlFile($content) {
        $filePath = _DIR_TOML_DATAS_ . "1tomlDatas.toml";

        file_put_contents($filePath, $content);
    }
    

    function addDataToToml($section, $data) {
        
        $content = $this->readTomlFile();
    
        $newDataString = '';
        $newDataString .= "[$section]\n";
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $newDataString .= "$key = \"$value\"\n";
            } else {
                $newDataString .= "$key = $value\n";
            }
        }
    
        $content .= "\n$newDataString";
        $this-> writeTomlFile($content);
    }    


}