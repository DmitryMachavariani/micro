<?php
define("START", microtime(true));
define("VERSION", "0.01");
define("ENV", "TESTING");

switch(ENV){
    case "TESTING":
    
    break;
    
    case "PRODUCTION":
    
    break;
    
    default:
        die("Не правильно указана среда выполнения");
}

define("BASEPATH", __DIR__);
define("FILEPATH", __FILE__);

define("app", BASEPATH."/application");
define("framework", BASEPATH."/framework");

define("url", "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF'])."/");

require_once(framework."/Sun.php");
$config = app."/config/config.php";

$app = new Sun;
$app->start($config);