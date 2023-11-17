<?php

namespace bin\epaphrodite\env\toml;

use bin\epaphrodite\env\toml\traits\AddToTomlFile;
use bin\epaphrodite\env\toml\traits\readTomlFiles;

final class toml{
    private string $section = '';

    private string $newTable = '';
    private array $param = [];
    private array $tomlData = [];

use readTomlFiles , AddToTomlFile;
}