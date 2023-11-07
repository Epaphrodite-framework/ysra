<?php

namespace bin\epaphrodite\define\config;

use bin\epaphrodite\define\config\traits\currentStaticArray;
use bin\epaphrodite\define\config\traits\currentSetGuardSecure;
use bin\epaphrodite\define\config\traits\currentFunctionNamespaces;
use bin\epaphrodite\define\config\traits\currentVariableNameSpaces;

class currentNameSpace{
    use currentFunctionNamespaces, currentVariableNameSpaces , currentStaticArray , currentSetGuardSecure;
}