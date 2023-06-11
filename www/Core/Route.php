<?php

namespace Core;

class Route
{
    private string $uri;
    private string $controller;
    private string $action;
    private string $name;

    private string $method = "GET";
    public function __construct(string $uri, array $callable)
    {
        $this->uri = $uri;
        $this->controller = $callable["controller"];
        $this->action = $callable["action"];
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function matchRoute(string $uri):bool
    {
       return $this->uri === $uri;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getName():string
    {
        return $this->name;
    }
    public function setName(string $name): Route
    {
        $this->name = $name;
        return $this;
    }
    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): Route
    {
        $this->method = $method;
        return $this;
    }

}