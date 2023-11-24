<?php

namespace epaphrodite\epaphrodite\define\config;

use epaphrodite\epaphrodite\define\config\traits\currentStaticArray;
use epaphrodite\epaphrodite\define\config\traits\currentSetGuardSecure;
use epaphrodite\epaphrodite\define\config\traits\currentFunctionNamespaces;
use epaphrodite\epaphrodite\define\config\traits\currentVariableNameSpaces;

class currentNameSpace{
    use currentFunctionNamespaces, currentVariableNameSpaces , currentStaticArray , currentSetGuardSecure;
}