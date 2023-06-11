<?php
namespace App\Controllers;
use Core\View;

final class Front{


    public function home()
    {
        $pseudo = "Prof";
        $view = new View("main/homepage", "back");
        $view->assign("pseudo", $pseudo);
        $view->assign("lastname", "SKZYPCZYK");
    }


    public function contact()
    {
        die("Voici ma nouvelle page de contact");
    }


}