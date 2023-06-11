<?php

namespace App\Controllers;

use Core\View;

class ErrorsController
{
    public function error404(): View
    {
        http_response_code(404);
        return new View("errors/404", "front");
    }
    
}