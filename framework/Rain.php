<?php

class Rain {
    private static $_app;
    private $components = [];

    public function __construct() {
        self::setApp($this);
    }

    public function start($config) {
        //Подключаем настройки приложения
        require($config);

        //Инициализируем все компоненты
        if (isset($config['components'])) {
            foreach ($config['components'] as $key => $value) {
                if (isset($value['class'])) {
                    $this->loadClass($value['class'], "/kernel/", $value);
                    $this->components[$key] = $value;
                } else {
                    die("Class param not found");
                }
            }
        }

        //Подгружаем главный класс контроллера
        $this->loadClass("Controller", "/kernel/")->run();
    }

    public function __get($name) {
        if (array_key_exists($name, $this->components)) {
            $path = framework . '/kernel/' . $this->components[$name]['class'] . '.php';

            if (file_exists($path)) {
                require_once($path);
                $classname = $this->components[$name]['class'];
                return new $classname($this->components[$name]);
            }
        }
    }

    public function baseUrl() {
        $url = '/' . basename(dirname(__DIR__));

        return $url;
    }

    public static function setApp($app) {
        if (self::$_app === null || $app === null) self::$_app = $app;
    }

    public function loadClass($name, $dir = 'helpers', $params = []) {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $path = framework . $dir . "/" . $value . ".php";
                if (file_exists($path)) require($path);
            }
        } else {
            $path = framework . $dir . "/" . $name . ".php";
            if (file_exists($path)) require($path);
        }

        if (count($params) > 0 && is_array($params))
            return new $name($params);
        else
            return new $name;
    }

    public function end() {
        return exit();
    }

    public static function app() {
        return self::$_app;
    }
}