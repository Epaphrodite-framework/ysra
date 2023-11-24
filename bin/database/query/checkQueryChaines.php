<?php

namespace epaphrodite\database\query;

use epaphrodite\database\query\buildQuery\buildQuery;
use epaphrodite\database\query\buildChaines\queryChaines;
use epaphrodite\database\query\buildChaines\buildQueryChaines;
use epaphrodite\epaphrodite\define\config\traits\currentFunctionNamespaces;

class checkQueryChaines{
  
    use queryChaines, buildQuery , buildQueryChaines, currentFunctionNamespaces;
}