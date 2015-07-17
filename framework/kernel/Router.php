<?php

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
     * @param array $param
     *
     * @return null|string
     */
    public function redirect($url, $param = null) {
        if (substr_count($url, '/') === 1 && (is_array($param) && count($param) > 0)) {
            $url = $this->createUrl($url, $param);
            header('Location: ' . $url);
        } else {
//            Генерируем другой URL
        }
    }
}