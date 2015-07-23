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

        //Подключаем класс компонент
        $this->loadClass("Component", "/base");

        //Инициализируем все компоненты
        if (isset($config['components'])) {
            foreach ($config['components'] as $key => $value) {
                if (isset($value['class'])) {
                    $this->loadClass($value['class'], '', $value);
                    $this->components[$key] = new $value['class']($value);
                } else {
                    die("Class param not found");
                }
            }
        }

        $this->loadClass("Controller")->run();
    }

    public function __get($name) {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }
    }

    public function baseUrl() {
        $url = rtrim(dirname($_SERVER['PHP_SELF']), '/');

        return $url;
    }

    public static function setApp($app) {
        if (self::$_app === null || $app === null) self::$_app = $app;
    }

    public function loadClass($name, $dir = '', $params = []) {
        if ($dir != '') {
            $path = app . $dir . DIRECTORY_SEPARATOR . $name . ".php";
        } else {
            $path = app . '/components' . DIRECTORY_SEPARATOR . $name . ".php";
        }
        if (file_exists($path)) {
            require($path);
        } else {
            if ($dir != '') {
                $path = framework . $dir . DIRECTORY_SEPARATOR . $name . ".php";
            } else {
                $path = framework . '/kernel' . DIRECTORY_SEPARATOR . $name . ".php";
            }

            if (file_exists($path)) {
                require($path);
            }
        }

        if (is_array($params) && count($params) > 0)
            return new $name($params);
        else
            return new $name;
    }

    public static function end() {
        return exit();
    }

    public static function app() {
        return self::$_app;
    }
}