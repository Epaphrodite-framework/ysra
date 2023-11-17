<?php

namespace bin\epaphrodite\env\toml\traits;

use Yosymfony\Toml\Toml;

class TableNotFoundException extends \InvalidArgumentException
{
}
class TomlParsingException extends \RuntimeException
{
}

trait readTomlFiles
{

    /**
     * Reads data from the TOML file.
     * 
     * @param int|null $file Optional file parameter
     * @return self
     * @throws TomlParsingException If failed to read the TOML file
     */
    public function read(?int $file = 1): self
    {
        $tomlFilePath = $this->loadTomlFile($file);

        try {
            if (!file_exists($tomlFilePath)) {
                throw new \RuntimeException("TOML file '$tomlFilePath' not found.");
            }
            $this->tomlData = Toml::parseFile($tomlFilePath);
        } catch (\Exception $e) {
            throw new TomlParsingException("Failed to read TOML file: " . $e->getMessage(), 0, $e);
        }
        return $this;
    }

    /**
     * Specifies the table to use from the TOML data.
     * 
     * @param string $table Table name
     * @return self
     * @throws TableNotFoundException If the specified table is not found in the TOML data.
     */
    public function section(string $section): self
    {
        if (!isset($this->tomlData[$section])) {
            throw new TableNotFoundException("Section '$section' not found in TOML data.");
        }

        $this->table = $section;

        return $this;
    }

    /**
     * Specifies multiple parameters to retrieve from the table.
     * 
     * @param array $params Array of parameter names
     * @return self
     */
    public function param(array $params): self
    {
        $this->param = $params;

        return $this;
    }

    /**
     * Retrieves either specific elements from the table or the entire table.
     * 
     * @return mixed|null Either an associative array of specified elements or a single element
     */
    public function get()
    {
        if (!isset($this->tomlData[$this->table])) {
            return null;
        }

        if (is_array($this->param)) {
            $result = [];
            foreach ($this->param as $param) {
                $result[$param] = $this->tomlData[$this->table][$param] ?? null;
            }
            return $result;
        }

        return $this->tomlData[$this->table][$this->param] ?? null;
    }

    /**
     * Generates the path to the TOML file based on the given filename.
     * 
     * @param int|null $file Filename without extension
     * @return string Full path to the TOML file
     */
    private function loadTomlFile(?int $file): string
    {
        return _DIR_TOML_DATAS_ . "{$file}tomlDatas.toml";
    }


}
