<?php

use Core\Route;

$router->get((new Route("/",["controller"=>\App\Controllers\HomeController::class,"action"=>"index"]))->setName("home"));
$router->get((new Route("/register",["controller"=>\App\Controllers\Security::class,"action"=>"register_form"]))->setName("security.register"));
$router->post((new Route("/register",["controller"=>\App\Controllers\Security::class,"action"=>"register"]))->setName("security.register"));

require ROOT."/routes/errors.php";
