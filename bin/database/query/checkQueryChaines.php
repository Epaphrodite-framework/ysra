<?php

namespace bin\database\query;

use bin\epaphrodite\define\config\traits\currentFunctionNamespaces;

class checkQueryChaines{
  
    use noSqlQueryChaines, sqlQueryChaines, currentFunctionNamespaces;
}