<?php

/**
 * Class Session
 */
class Session {
    /**
     * Session constructor.
     */

    private $_id;
    private $_message;

    /**
     * @param $param
     */
    public function __construct($param) {
        if (isset($param['autoStart']) && $param['autoStart'] == true) {
            session_start();
            $this->_id = session_id();
        }
    }

    /**
     * @return string
     */
    public function getId() {
        return $this->_id;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function get($name) {
        if (isset($_SESSION[$name]) && $_SESSION[$name] != null) {
            return $_SESSION[$name];
        }
    }

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function hasMessage($name) {
        if ($this->get($name))
            return true;
        else
            return false;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setMessage($name, $value) {

    }

    public function getMessage($name, $value) {

    }
}