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

    /**
     * @return bool
     */
    private function getGuest() {
        return !parent::exist('rain_auth');
    }

    /**
     * @return mixed
     */
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
        parent::delete('rain_auth');

        parent::delete('rain_u');
        parent::delete('rain_p');

        return true;
    }

    public function generatePassword($password, $type = PASSWORD_BCRYPT){
        return password_hash($password, $type);
    }

    public function verifyPassword($password, $hash){
        return password_verify($password, $hash);
    }

}