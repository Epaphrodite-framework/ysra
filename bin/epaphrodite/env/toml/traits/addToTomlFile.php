<?php

namespace bin\epaphrodite\env\toml\traits;

trait AddToTomlFile
{

    private array $value = [];
    private string $mergeDatas = '';
    private string $newSection = '';

    /**
     * Sets the values to be added to the TOML file.
     *
     * @param array $value Key-value pairs to add to the file
     * @return $this
     */

    public function value(array $value = []): self
    {

        $this->value = $value;

        return $this;
    }

    /**
     * Adds the specified values to the TOML file.
     *
     * @param int|null $file Filename without extension
     * @return bool
     */
    public function add(?int $file = 1): bool
    {

        $content = $this->readTomlFile($file);

        $this->mergeDatas .= "[$this->section]\n";
        foreach ($this->value as $key => $value) {
            if (is_string($value)) {
                $this->mergeDatas .= "$key = \"$value\"\n";
            } else {
                $this->mergeDatas .= "$key = $value\n";
            }
        }

        $content .= "\n$this->mergeDatas";
        $this->writeTomlFile($file, $content);

        return true;
    }
}
