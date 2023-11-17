<?php

namespace bin\epaphrodite\env\toml\traits;

trait loadTomlFile
{

    /**
     * Reads content from the TOML file.
     *
     * @param int|null $file Filename without extension
     * @return string Content of the TOML file
     */
    public function readTomlFile($file)
    {

        $filePath = $this->loadTomlFile($file);

        return file_exists($filePath) ? file_get_contents($filePath) : NULL;
    }

    /**
     * Writes content to the TOML file.
     *
     * @param int|null $file Filename without extension
     * @param string $content Content to write to the file
     * @return void
     */
    public function writeTomlFile(?int $file, string $content): void
    {

        $filePath = $this->loadTomlFile($file);

        file_exists($filePath) ? file_put_contents($filePath, $content) : NULL;
    }

    /**
     * Generates the path to the TOML file based on the given filename.
     * 
     * @param int|null $file Filename without extension
     * @return string Full path to the TOML file
     */
    public function loadTomlFile(?int $file): string
    {

        return _DIR_TOML_DATAS_ . "{$file}tomlDatas.toml";
    }
}