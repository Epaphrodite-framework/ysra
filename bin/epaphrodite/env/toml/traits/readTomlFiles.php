<?php

namespace bin\epaphrodite\env\toml\traits;

use Yosymfony\Toml\Toml;


trait readTomlFiles
{

    private array $param = [];
    private string $section = '';
    private array $tomlData = [];

    /**
     * Reads data from the TOML file.
     * 
     * @param int|null $file Optional file parameter
     * @return self
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
            throw new \RuntimeException("Failed to read TOML file: " . $e->getMessage(), 0, $e);
        }

        var_dump($tomlFilePath);die();

        return $this;
    }

    /**
     * Specifies the table to use from the TOML data.
     * 
     * @param string $section Table name
     * @return self
     */
    public function section(string $section): self
    {

        $this->section = $section;

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
        if (!isset($this->tomlData[$this->section])) {
            return null;
        }

        if (is_array($this->param)) {
            $result = [];
            foreach ($this->param as $param) {
                $result[$param] = $this->tomlData[$this->section][$param] ?? null;
            }
            return $result;
        }

        return $this->tomlData[$this->section][$this->param] ?? null;
    }
}
