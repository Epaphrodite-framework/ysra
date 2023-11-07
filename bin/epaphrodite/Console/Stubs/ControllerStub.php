<?php

namespace bin\epaphrodite\Console\Stubs;

class ControllerStub{

    public static function GenerateControlleurs($FilesNames, $name , $html='$html')
    {
$stub = 
"<?php
    namespace bin\\controllers\\controllers;

    use bin\\controllers\\switchers\\MainSwitchers;

    class $name extends MainSwitchers
    {
        ".'private $msg;
        private $datas;
        private $select;
        private $session;'."

        function __construct()
        {
            ".'$this->select = new $this->Request["select"];
            $this->msg = new static::$MainNameSpace["msg"];
            $this->datas = new static::$MainNameSpace["datas"];
            $this->session = new static::$MainNameSpace["session"];'."
        }

        public function exemplePages($html)
        {
            //
        }
    }";
    file_put_contents($FilesNames, $stub);
    }
}