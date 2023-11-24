<?php

namespace epaphrodite\epaphrodite\env\toml;

use epaphrodite\epaphrodite\env\toml\traits\delToTomlFile;
use epaphrodite\epaphrodite\env\toml\traits\loadTomlFile;
use epaphrodite\epaphrodite\env\toml\traits\AddToTomlFile;
use epaphrodite\epaphrodite\env\toml\traits\readTomlFiles;

final class noellaToml{

    use loadTomlFile, readTomlFiles , AddToTomlFile, delToTomlFile;
}