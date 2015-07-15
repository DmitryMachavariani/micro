<?php
define("VERSION", "0.01");

define("BASEPATH", __DIR__);
define("FILEPATH", __FILE__);

define("app", BASEPATH . "/application");
define("framework", BASEPATH . "/framework");

define("url", "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['PHP_SELF']) . "/");

require_once(framework . "/Rain.php");
$config = app . "/config/config.php";

$app = new Rain();
$app->start($config);