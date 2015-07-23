<?php

abstract class BaseController extends Component {
    protected static $default_base = 'site/index';

    public function run() {
        $controller = $this->getController();
        $action = $this->getAction();

        $class = $this->createController($controller);
        $class->$action();
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
            exit("Not found file " . app . "/views/" . $this->getController() . "/" . $file . ".php" . "");
        }
    }

    public function renderFile($file, $params = []) {
        $path = app . "/views/" . $this->getController() . $file . ".php";
        if (is_file($path) && file_exists($path)) {
            extract($params, EXTR_OVERWRITE);
            require($path);
        } else {
            exit("Not found file " . app . "/views/" . $this->getController() . "/" . $file . ".php" . "");
        }
    }

    public static function getController() {
        $data = isset($_GET['d']) ? explode("/", $_GET['d']) : explode("/", self::$default_base);
        if (!file_exists(app . "/controllers/" . ucfirst($data[0]) . "Controller.php")) {
            exit("Not found file " . app . "/controllers/" . ucfirst($data[0]) . "Controller.php");
        } else {
            return strtolower($data[0]);
        }
    }

    public static function getAction() {
        $data = isset($_GET['d']) ? explode("/", $_GET['d']) : explode("/", self::$default_base);
        return strtolower($data[1]);
    }

    public function createController($name) {
//        if (!is_string($name) || trim($name, '/') === '') {
//            $name = $this->default;
//        }

        $name = ucfirst(trim($name, '/') . 'Controller');
        $fullPath = app . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $name;
        if (is_file($fullPath . '.php')) {
            require_once $fullPath . '.php';


            if (class_exists($name) && is_subclass_of($name, 'BaseController')) {
                $class = new $name;
                return $class;
            }
        }
    }
}