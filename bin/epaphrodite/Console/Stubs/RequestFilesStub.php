<?php

namespace epaphrodite\epaphrodite\Console\Stubs;

class RequestFilesStub extends SqlStub{

public static function generate($FilesNames, $name , $type)
{
    $content = static::SwicthRequestContent($type,$name);
    
$stub = 
"<?php
    namespace epaphrodite\\database\\requests\\mainRequest\\$type;

    use epaphrodite\\database\\requests\\typeRequest\\sqlRequest\\$type\\$type as $type$type;

    class {$name} extends $type$type
    {

        $content

    }";
    
    file_put_contents($FilesNames, $stub);
    }
}