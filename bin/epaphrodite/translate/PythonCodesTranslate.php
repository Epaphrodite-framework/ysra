<?php

namespace bin\epaphrodite\translate;

use bin\epaphrodite\env\config\GeneralConfig;

class PythonCodesTranslate extends GeneralConfig
{
    /**
     * @param string|null $pyFunction
     * @param array $datas
     * @return mixed
     */
    public function executePython(?string $pyFunction = null, array $datas = [])
    {
        $getJsonContent = $this->getJson();

        if (!empty($getJsonContent[$pyFunction])) {

            $scriptInfo = $getJsonContent[$pyFunction];

            $mergedDatas = array_merge(['function' => $scriptInfo["function"]], $datas);

            return $this->pythonSystemCode(_PYTHON_ . $scriptInfo["script"], $mergedDatas);
            
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    private function getJson(): array
    {
        $getFiles = _PYTHON_ . 'config/config.json';

        return json_decode(file_get_contents($getFiles), true);
    }
}
