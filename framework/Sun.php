<?php

class Sun{
    private static $_app;
    private $components = [];

    public function __construct(){
        self::setApp($this);
    }

    public function start($config){
        //Подключаем настройки приложения
        require($config);

        //Инициализируем все компоненты
        if(isset($config['components'])){
            foreach($config['components'] as $key => $value){
                if(isset($value['class'])){
                    $this->loadClass($value['class'], "/kernel/")->run($value);
                    $this->components[$key] = $value['class'];
                }else{
                    die("Class param not found");
                }
            }
        }

        //Подгружаем главный класс контроллеры
        $this->loadClass("Controller", "/kernel/")->run();
    }

    public function get($name){
        var_dump($this->components);
        if(array_key_exists($name, $this->components)){
            $path = framework.'/kernel/'.$this->components[$name].'.php';

            if(file_exists($path)){
                require_once($path);
                return new $this->components[$name];
            }
        }
    }

    public function baseUrl(){
        $url = '/'.basename(dirname(__DIR__));

        return $url;
    }

    public static function setApp($app){
        if(self::$_app === null || $app === null) self::$_app = $app;
    }

    public function loadClass($name, $dir = 'helpers'){
        if(is_array($name)){
            foreach($name as $key => $value){
                $path = framework.$dir."/".$value.".php";
                if(file_exists($path)) require($path);
            }
        }else{
            $path = framework.$dir."/".$name.".php";
            if(file_exists($path)) require($path);
        }

        return new $name;
    }

    public static function app(){
        return self::$_app;
    }
}