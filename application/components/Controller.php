<?php

class Controller extends Component{
    protected static $default = 'site/qwerty';

    public function run() {
        $controller = self::getController();
        $action = self::getAction();

        echo $action;

//        require(app . "/controllers/" . ucfirst($controller) . "Controller.php");
//        $name = ucfirst($controller) . "Controller";
//        $controller = new $name;
//        $controller->$action();
    }
}