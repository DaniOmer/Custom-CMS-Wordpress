<?php

use Core\Route;

$router->get((new Route("/404",["controller"=>\App\Controllers\ErrorsController::class,"action"=>"error404"]))->setName("errors.404"));