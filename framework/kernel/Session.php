<?php

/**
 * Class Session
 */
class Session extends Component {
    /**
     * Session constructor.
     */

    private $_id;

    /**
     * @param $param
     */
    public function __construct($param) {
        if (isset($param['autoStart']) && $param['autoStart'] == true) {
            @session_start();
            $this->_id = session_id();
        }
    }

    public function exist($name) {
        return isset($_SESSION[$name]);
    }

    public function count(){
        return count($_SESSION);
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
    protected function get($name) {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    /**
     * @param $name
     * @param $value
     */
    protected function set($name, $value) {
        $_SESSION[$name] = $value;
    }


    protected function destroy($name) {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public function hasMessage($name) {
        if ($this->get($name)) {

            return true;
        } else
            return false;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setMessage($name, $value) {
        $this->set($name, $value);
    }

    public function getMessage($name) {
        $result = $this->get($name);
        $this->destroy($name);

        return $result;
    }


}