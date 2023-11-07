<?php
namespace bin\epaphrodite\translate;

use bin\epaphrodite\env\config\GeneralConfig;

class PythonCodesTranslate extends GeneralConfig{
  
    /**
     * @param string|null $Files
     * @param array|[] $datas
     * @return mixed
     */
    public function executePython(? string $Files = null , ?array $datas = [] ){

        $jsonValues = json_encode($datas);

        $escapedValues = escapeshellarg($jsonValues);

        $this->pythonSystemCode( _PYTHON_ . $Files , $escapedValues );
    }
}

