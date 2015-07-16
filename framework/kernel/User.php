<?php

/**
 * Class User
 */
class User extends Session {
    /**
     * @param $name
     */
    public function __get($name) {
        if (method_exists($this, 'get' . ucfirst($name))) {
            $name = 'get' . ucfirst($name);
            return $this->$name();
        }
    }

    private function getGuest() {
        return parent::exist('rain_auth');
    }

    private function getName() {
        return parent::get('rain_u');
    }

    /**
     * @param $username
     * @param $password
     * @param int $duration
     *
     * @return bool
     */
    public function login($username, $password, $duration = 3600) {
        parent::set('rain_auth', true);

        parent::set('rain_u', $username);
        parent::set('rain_p', $password);

        return true;
    }

    /**
     * @return bool
     */
    public function logout() {
        parent::destroy('rain_auth');

        parent::destroy('rain_u');
        parent::destroy('rain_p');

        return true;
    }

}