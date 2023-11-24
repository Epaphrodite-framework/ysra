<?php

namespace epaphrodite\database\query;

use epaphrodite\database\config\Contracts\Builders as ContractsBuilders;

class Builders extends checkQueryChaines implements ContractsBuilders
{

  /**
   * @return mixed
   */
  public static function firstSeederGeneration()
  {

    return static::initConfig()['seeder']->SeederGenerated();
  }

  /**
   * @return mixed
   */
  public function checkDbType()
  {

    return _DATABASE_ === 'sql' ? true : false;
  }
}
