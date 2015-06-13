<?php

class Controller{
    public static $default = 'test/index';

    public function __contstuct(){
        $this->run();
    }

    public function run(){
        $controller = self::getController();
        $action = self::getAction();

        require(app."/controllers/".ucfirst($controller)."Controller.php");
        $name = ucfirst($controller)."Controller";
        $controller = new $name;
        $controller->$action();
    }

    public function render($file, $params = array()){
        $path = app."/views/".self::getController()."/".$file.".php";
        if(is_file($path) && file_exists($path)){
            ob_start();
            extract($params, EXTR_OVERWRITE);
            require_once($path);
            $content = ob_get_contents();
            ob_get_clean();
            require(app."/views/layouts/main.php");
        }
    }

    public function renderFile($file, $params = array()){
        $path = app."/views/".self::getController().$file.".php";
        if(is_file($path) && file_exists($path)){
            extract($params, EXTR_OVERWRITE);
            require($path);
        }
    }

    public function redirect($url = [], $param = []){
        header("Location: ".$url);
    }

    public static function getController(){
        $data = isset($_GET['d']) ? explode("/", $_GET['d']) : explode("/", self::$default);
        return strtolower($data[0]);
    }

    public static function getAction(){
        $data = isset($_GET['d']) ? explode("/", $_GET['d']) : explode("/", self::$default);
        return strtolower($data[1]);
    }
}