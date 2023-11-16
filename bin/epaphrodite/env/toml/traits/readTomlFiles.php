<?php

namespace bin\epaphrodite\env\toml\traits;

use Yosymfony\Toml\Toml;

trait readTomlFiles
{
    private string $table = '';
    private array $param = [];
    private array $tomlData = [];

    /**
     * Loads data from the TOML file.
     * 
     * @return self
     */
    public function read(): self {
        $tomlFilePath = _DIR_TOML_DATAS_ . 'tomldatas.toml';
        try {
            $this->tomlData = Toml::parseFile($tomlFilePath);
        } catch (\Exception $e) {
            // Log the error if reading the TOML file fails
            error_log("Failed to read TOML file: " . $e->getMessage());
        }
        return $this;
    }

    /**
     * Specifies the table to use from the TOML data.
     * 
     * @param string $table Table name
     * @return self
     * @throws \InvalidArgumentException If the specified table is not found in the TOML data.
     */
    public function table(string $table)
    {
        if (!isset($this->tomlData[$table])) {
            throw new \InvalidArgumentException("Table '$table' not found in TOML data.");
        }        

        $this->table = $table;

        return $this;
    }

    /**
     * Specifies multiple parameters to retrieve from the table.
     * 
     * @param array $params Array of parameter names
     * @return self
     */
    public function param(array $params)
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
}
