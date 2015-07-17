<?php

/**
 * Class Router
 */
class Router extends Component {
    /**
     * @param $to
     * @param array $param
     *
     * @return null|string
     */
    public function createUrl($to, $param = []) {
        $tmp_data = explode('/', $to);
        $url = NULL;

        if ($tmp_data[1] == null) {
            $tmp_data[1] = Controller::getAction();
        }

        if (count($param) == 0) {
            $url = url . "index.php?d=" . $tmp_data[0] . "/" . $tmp_data[1];
        } else {
            $url = url . "index.php?d=" . $tmp_data[0] . "/" . $tmp_data[1];

            foreach ($param as $key => $value) {
                $url .= "&" . $key . "=" . $value;
            }

        }

        return $url;
    }


    /**
     * @param $url
     * @param null $param
     * @param int $status
     * @param bool|true $replace
     */
    public function redirect($url, $param = null, $status = 302, $replace = true) {
        if (substr_count($url, '/') === 1) {
            if (is_array($param) && count($param) > 0) {
                $url = $this->createUrl($url, $param);
            } else {
                $url = $this->createUrl($url);
            }
            header('Location:' . $url, $replace, $status);
        } else {
            header('Location:' . $url, $replace, $status);
        }
    }

    public function refresh() {
        $param = $_GET;
        unset($param['d']);

        $to = Controller::getController() . '/' . Controller::getAction();

        $this->redirect($to, $param);
    }
}