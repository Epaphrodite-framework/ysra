<?php

namespace bin\database\query;

use bin\database\query\buildQuery\buildQuery;
use bin\database\query\buildChaines\queryChaines;
use bin\database\query\buildChaines\buildQueryChaines;
use bin\epaphrodite\define\config\traits\currentFunctionNamespaces;

class checkQueryChaines{
  
    use queryChaines, buildQuery , buildQueryChaines, currentFunctionNamespaces;
}