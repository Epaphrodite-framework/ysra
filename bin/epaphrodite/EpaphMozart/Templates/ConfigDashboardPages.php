<?php

namespace bin\epaphrodite\EpaphMozart\Templates;


class ConfigDashboardPages extends ConfigUsersMainPages
{

    private $interface;

    /**
     * Admin interface manager
     * 
     * @param string $key|null
     * @return string
     */
    public function admin(?int $key = null, ?string $url = null)
    {

        if ($key !== null) {

            $this->interface =
                [
                    1 => 'super_admin/',
                    2 => 'administrateur_central/',
                    3 => 'users/',
                ];

            return $url . $this->interface[$key];
        } else {
            return $this->login() . $url;
        }
    }

    /** 
     * Login interface manager
     */
    public function identification()
    {

        $this->interface = 'users/modifier_infos_users/';

        return $this->interface;
    }    

}
