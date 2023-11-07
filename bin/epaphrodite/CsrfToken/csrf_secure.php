<?php

namespace bin\epaphrodite\CsrfToken;

use bin\database\query\Builders;

class csrf_secure extends Builders
{

    /**
     * Update token into database
     *
     * @param string $cookies
     * @return void
     */
    private function UpdateUserCrsfToken($cookies)
    {

        $sql = $this->table('authsecure')
            ->set(['authkey', 'createat'])
            ->where('crsfauth')
            ->UQuery();

        static::process()->update($sql, [$cookies,  date("Y-m-d H:i:s"), md5(static::initNamespace()['session']->login())], true);
    }

    /**
     * Insert token into database
     *
     * @param string $cookies
     * @return array
     */
    private function CreateUserCrsfToken($cookies)
    {

        $sql = $this->table('authsecure')
            ->insert('crsfauth , authkey , createat')
            ->values(' ? , ? , ?')
            ->IQuery();

        static::process()->insert($sql, [md5(static::initNamespace()['session']->login()), $cookies, date("Y-m-d H:i:s")], true);

        return false;
    }

    /**
     *  Check token date
     */
    public function CheckUserCrsfToken()
    {

        $addDay = 1;
        $currentDate = date('Y-m-d');

        $startOfDay = $currentDate . " 23:59:59";
        $endOfDay = $currentDate . " 23:59:59";

        $currentDate = new \DateTime(date('Y-m-d'));
        $currentDate->add(new \DateInterval("P{$addDay}D"));

        $endOfDay = $currentDate->format('Y-m-d') . " 23:59:59";

        $sql = $this->table('authsecure')
            ->between('createat')
            ->and(['crsfauth'])
            ->SQuery('authkey');

        $result = static::process()->select($sql, [$startOfDay, $endOfDay, md5(static::initNamespace()['session']->login())], true);

        return !empty($result) ? $result[0]['authkey'] : 0;
    }

    /**
     * Get csrf value
     *
     * @return string
     */
    public function secure()
    {

        $sql = $this->table('authsecure')
            ->where('crsfauth')
            ->SQuery();

        $result = static::process()->select($sql, [md5(static::initNamespace()['session']->login())], true);

        if (!empty($result)) {
            return $result[0]['authkey'];
        } else {
            return 0;
        }
    }

     /**
     * Get csrf value
     *
     * @return string
     */
    public function noSqlSecure()
    {

        $documents = [];

        $result = $this->db(1)
          ->selectCollection('authsecure')
          ->find(['crsfauth' => md5(static::initNamespace()['session']->login())]);
  
          foreach ($result as $document) {
            $documents[] = $document;
        }
        
        return !empty($documents) ? $documents[0]['authkey'] : 0 ;
    }   

    /**
     * Insert token into database
     *
     * @param string $cookies
     * @return array
     */
    private function noSqlCreateUserCrsfToken($cookies)
    {

        $document =[
            'crsfauth' => md5(static::initNamespace()['session']->login()),
            'authkey' => $cookies,
            'createat' => date("Y-m-d H:i:s"),
        ];

        $this->db(1)->selectCollection('authsecure')->insertOne($document);

        return false;
    }   
    
    /**
     * Update token into database
     *
     * @param string $cookies
     * @return void
     */
    private function noSqlUpdateUserCrsfToken($cookies)
    {

        $filter = ['crsfauth' => md5(static::initNamespace()['session']->login())];

        $update = [
            '$set' => [
                'authkey' => $cookies,
                'createat' => date("Y-m-d H:i:s"),
            ],
        ];        

        $this->db(1)->selectCollection('authsecure')->updateOne($filter, $update);
    }  
    
   /**
     *  Check token date
     */
    public function noSqlCheckUserCrsfToken()
    {

        $addDay = 1;
        $currentDate = date('Y-m-d');

        $startOfDay = $currentDate . " 23:59:59";
        $endOfDay = $currentDate . " 23:59:59";

        $currentDate = new \DateTime(date('Y-m-d'));
        $currentDate->add(new \DateInterval("P{$addDay}D"));

        $endOfDay = $currentDate->format('Y-m-d') . " 23:59:59";

        $filter = [
            'createat' => [
                '$gte' => $startOfDay, 
                '$lte' => $endOfDay,
            ],
            'crsfauth' => md5(static::initNamespace()['session']->login()),
        ]; 
        
        $result = $this->db(1)->selectCollection('authsecure')->find($filter);

        foreach ($result as $document) {
            $documents[] = $document;
        }
        
        return !empty($documents) ? $documents[0]['authkey'] : 0 ;
    }    

    /**
     * Get rooting csrf
     *
     * @param string $cookies
     * @return void
     */
    public function get_csrf($key)
    {
        if(_DATABASE_ === 'sql'){

            return empty($this->secure()) ? $this->CreateUserCrsfToken($key) : $this->UpdateUserCrsfToken($key);
        }else{
            
            return empty($this->noSqlSecure()) ? $this->noSqlCreateUserCrsfToken($key) : $this->noSqlUpdateUserCrsfToken($key);
        }


    }
}
