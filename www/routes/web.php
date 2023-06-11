<?php

use Core\Route;

$router->get((new Route("/",["controller"=>\App\Controllers\HomeController::class,"action"=>"index"]))->setName("home"));

require ROOT."/routes/errors.php";
