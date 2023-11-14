<?php

namespace bin\database\query;

use bin\database\config\Contracts\Builders as ContractsBuilders;

class Builders extends checkQueryChaines implements ContractsBuilders
{

  /**
   * @return mixed
   */
  public static function process()
  {

    return  static::initConfig()['process'];
  }

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
