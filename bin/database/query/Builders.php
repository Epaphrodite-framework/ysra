<?php

namespace bin\database\query;

use bin\database\config\Contracts\Builders as ContractsBuilders;

class Builders extends checkQueryChaines implements ContractsBuilders
{

  /**
   * @return process
   */
  public static function process()
  {

    return  static::initConfig()['process'];
  }

  /**
   * @return firstSeederGeneration
   */
  public static function firstSeederGeneration()
  {

    return static::initConfig()['seeder']->SeederGenerated();
  }

  /**
   * @return checkDbType
   */
  public function checkDbType()
  {

    return _DATABASE_ === 'sql' ? true : false;
  }
}
