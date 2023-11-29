<?php

namespace epaphrodite\epaphrodite\env;

use epaphrodite\epaphrodite\env\pyEnv\pyEnv;
use epaphrodite\epaphrodite\env\phpEnv\phpEnv;
use epaphrodite\epaphrodite\env\config\GeneralConfig;
use epaphrodite\epaphrodite\define\config\traits\currentFunctionNamespaces;

class env extends GeneralConfig
{

    use currentFunctionNamespaces, phpEnv, pyEnv;
}
