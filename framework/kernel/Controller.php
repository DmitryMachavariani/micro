<?php

class Controller {
    protected static $default = 'site/index';

    public function run() {
        $controller = self::getController();
        $action = self::getAction();

        require(app . "/controllers/" . ucfirst($controller) . "Controller.php");
        $name = ucfirst($controller) . "Controller";
        $controller = new $name;
        $controller->$action();
    }

    public function render($file, $params = []) {
        $path = app . "/views/" . self::getController() . "/" . $file . ".php";
        if (is_file($path) && file_exists($path)) {
            ob_start();
            extract($params, EXTR_OVERWRITE);
            require_once($path);
            $content = ob_get_contents();
            ob_get_clean();
            require(app . "/views/layouts/main.php");
        } else {
            exit("Not found file " . app . "/views/" . self::getController() . "/" . $file . ".php" . "");
        }
    }

    public function renderFile($file, $params = []) {
        $path = app . "/views/" . self::getController() . $file . ".php";
        if (is_file($path) && file_exists($path)) {
            extract($params, EXTR_OVERWRITE);
            require($path);
        } else {
            exit("Not found file " . app . "/views/" . self::getController() . "/" . $file . ".php" . "");
        }
    }

    public static function getController() {
        $data = isset($_GET['d']) ? explode("/", $_GET['d']) : explode("/", self::$default);
        if (!file_exists(app . "/controllers/" . ucfirst($data[0]) . "Controller.php")) {
            exit("Not found file " . app . "/controllers/" . ucfirst($data[0]) . "Controller.php");
        } else {
            return strtolower($data[0]);
        }
    }

    public static function getAction() {
        $data = isset($_GET['d']) ? explode("/", $_GET['d']) : explode("/", self::$default);
//        if (!file_exists(app . "/views/" . self::getController() . "/" . $data[1] . ".php")) {
//            exit("Not found file " . app . "/views/" . self::getController() . "/" . $data[1] . ".php" . "");
//        } else {
//            if (!method_exists('Controller', $data[1])) {
//                exit("Not found action " . $data[1] . "() in controller " . ucfirst($data[0]) . "Controller.php");
//            } else {
                return strtolower($data[1]);
//            }
//        }
    }
}