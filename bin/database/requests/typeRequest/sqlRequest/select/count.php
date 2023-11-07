<?php

namespace bin\database\requests\typeRequest\sqlRequest\select;

use bin\database\requests\typeRequest\noSqlRequest\select\count as SelectCount;

class count extends SelectCount
{

  /**
   * request to count users messages
   *
   * @param integer session logon
   * @return array
   */
  public function sqlChatMessages()
  {

    $login = static::initNamespace()['session']->login();

    $sql = $this->table('chatsmessages')
      ->like('destinataire')
      ->and(['etatmessages'])
      ->SQuery('COUNT(*) AS nbre');

    $result = static::process()->select($sql, ["$login", 1], true);

    return $result[0]['nbre'];
  }

  /**
   * Get total users number
   * @return int
   */
  public function sqlCountAllUsers()
  {
    $sql = $this->table('useraccount')->SQuery("COUNT(*) AS nbre");

    $result = static::process()->select($sql, NULL, false);

    return $result[0]['nbre'];
  }

  /** 
   * Get total number of user bd
   * @param int $Group
   * @return int
   */
  public function sqlCountUsersByGroup(int $Group)
  {
    $sql = $this->table('useraccount')
      ->where('typeusers')
      ->SQuery("COUNT(*) AS nbre");

    $result = static::process()->select($sql, [$Group], true);

    return $result[0]['nbre'];
  }
}
