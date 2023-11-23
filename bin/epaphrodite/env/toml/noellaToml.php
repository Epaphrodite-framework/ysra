<?php

namespace bin\epaphrodite\env\toml;

use bin\epaphrodite\env\toml\traits\delToTomlFile;
use bin\epaphrodite\env\toml\traits\loadTomlFile;
use bin\epaphrodite\env\toml\traits\AddToTomlFile;
use bin\epaphrodite\env\toml\traits\readTomlFiles;

final class noellaToml{

    use loadTomlFile, readTomlFiles , AddToTomlFile, delToTomlFile;
}