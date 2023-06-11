<?php
require "../vendor/autoload.php";

define("ROOT", dirname(__DIR__));

use Core\Router;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require ROOT."/conf.inc.php";

$router = new Router();
require ROOT . "/routes/web.php";
$router->run();



