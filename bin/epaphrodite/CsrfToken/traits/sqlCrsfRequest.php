<?php

declare(strict_types=1);

namespace bin\epaphrodite\CsrfToken\traits;

trait sqlCrsfRequest
{

    /**
     * Update token into database
     *
     * @param string $cookies
     * @return void
     */
    private function UpdateUserCrsfToken(?string $cookies = null): void
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
     * @return bool
     */
    private function CreateUserCrsfToken(?string $cookies = null): bool
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
     * @return string|int
     */
    public function CheckUserCrsfToken(): string|int
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
     * @return string|int
     */
    public function secure(): string|int
    {

        $sql = $this->table('authsecure')
            ->where('crsfauth')
            ->SQuery();

        $result = static::process()->select($sql, [md5(static::initNamespace()['session']->login())], true);

        return !empty($result) ? $result[0]['authkey'] : 0;
    }
}
