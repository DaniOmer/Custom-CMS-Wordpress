<?php

namespace App\Controllers;

use App\Forms\Register;
use Core\Router;
use Core\Session;
use Core\View;
use JetBrains\PhpStorm\NoReturn;

final class Security
{
    public function register_form(): View
    {
        return new View("security/register");
    }

    public function register(): void
    {
        $form = new Register();
        $errors = $form->isValid();
        if(!empty($errors)){
            Session::set("errors",$errors);
            Router::redirectTo("security.register");
        }

        Router::redirectTo("home");
    }


}