<?php

namespace Core;

use Core\Route;

class Router
{
    private array $routes = [];
    private static ?Router $instance = null;



    public static function getInstance(): ?Router
    {
        if (is_null(self::$instance)) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    public static function url(string $name)
    {
        $router = self::getInstance();
        $route = $router->getRouteByName($name);
        if(is_null($route)){
            http_response_code(404);
            die("404 Not Found");
        } else{
            return $route->getUri();
        }
    }

    public static function redirectTo(string $name): void
    {
        $router = self::getInstance();
        $route = $router->getRouteByName($name);
        if(is_null($route)){
            http_response_code(404);
            die("404 Not Found");
        } else{
            header("Location: " . $route->getUri());
        }
    }


    public function get(Route $route):void
    {
        $this->routes[$route->getMethod()][] = $route;
    }


    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function run(): void
    {
        $uri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];
        $routes = $this->getRoutes();
        $routeFound = false;
        foreach ($routes[$method] as $route) {
            if ($route->matchRoute($uri)) {
                $routeFound = true;
                $controller = new ($route->getController())();
                $action = $route->getAction();
                $controller->$action();
            }
            if ($routeFound) {
                break;
            }
        }
        if (!$routeFound) {
            http_response_code(404);
            self::redirectTo("errors.404");
        }
    }

    private function getRouteByName(string $name,string $method = "GET"): ?Route
    {
        $router = self::getInstance();
        require ROOT . "/routes/web.php";
        foreach ($this->routes[$method] as $route) {
            if ($route->getName() === $name) {
                return $route;
            }
        }
        return null;
    }

}