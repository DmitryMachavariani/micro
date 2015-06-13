<?php
class Sun{
    private static $_app;
    
    
    public function __construct(){
        self::setApp($this);
    }
    
    private function loadConfig(){
        //require(app."/config/config.php");
        
        echo time();
    }
    
    private function loadBaseClass(){
        $class_map = array(
            ''
        );
    }
    
    public function start(){
        if (ENV == "TESTING"){
            //$this->loadConfig();
            $this->loadClass("Controller", "/kernel/")->run();
        }
    }

    public function getComponent($name){
        $path = framework.'/kernel/'.$name.'.php';

        if(file_exists($path)){
            require($path);
            return new $name;
        }
    }

    public function baseUrl(){
        $url = $_SERVER['SERVER_NAME'];
        $url = '/'.basename(dirname(__DIR__));

        return $url;
    }
    
    public static function setApp($app){
        if(self::$_app === null || $app === null)
			self::$_app = $app;
    }
    
    public function loadClass($name, $dir = 'helpers'){
        if(is_array($name)){
            foreach($name as $key => $value){
                $path = framework.$dir."/".$value.".php";
                if(file_exists($path))
                    require($path);
            }
        }else{
            $path = framework.$dir."/".$name.".php";
            if(file_exists($path))
                require($path);
        }
        
        return new $name;
    }
    
    public static function app(){
        return self::$_app;
    }
}