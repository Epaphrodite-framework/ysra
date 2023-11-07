<?php

namespace bin\database\requests\typeRequest\noSqlRequest\select;

use bin\database\query\Builders;

class auth extends Builders
{

  /**
   * Verify if useraccount table exist in database (For mongodb)
   * @return bool
   */
  protected function ifCollectionExist()
  {

    $collections = $this->db(1)->listCollections();

    $result = false;

    foreach ($collections as $collectionInfo) {
      if ($collectionInfo->getName() === "useraccount") {
        $result = true;
        break;
      }
    }

    return $result;
  }

  /**
   * Request to select all users of database (For mongo db)
   * 
   * @param string $loginuser
   * @return array
   */
  public function findNosqlUsers(string $loginuser)
  {

    if ($this->ifCollectionExist() === true) {

      $documents = [];

      $result = $this->db(1)
        ->selectCollection('useraccount')
        ->find(['loginusers' => $loginuser]);

      foreach ($result as $document) {
        $documents[] = $document;
      }

      return $documents;
    } else {
      static::firstSeederGeneration();
      return NULL;
    }
  }
}
