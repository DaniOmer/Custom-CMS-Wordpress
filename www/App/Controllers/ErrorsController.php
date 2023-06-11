<?php

namespace App\Controllers;

use Core\View;

class ErrorsController
{
    public function error404(): View
    {
        return new View("errors/404", "front");
    }
    
}