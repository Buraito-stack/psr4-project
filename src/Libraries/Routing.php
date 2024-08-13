<?php

namespace MiniMarkPlace\Libraries;

class Routing
{
    protected $routes = [];

    public function add($method, $route, $callback)
    {
        $this->routes[$method][$route] = $callback;
    }

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
    
        foreach ($this->routes[$method] as $route => $callback) {
            // Ganti :id dengan (\d+) untuk menangkap parameter ID
            $regexPattern = str_replace(['/', ':id'], ['\/', '(\d+)'], $route);
            $regexPattern = "#^{$regexPattern}$#";
    
            if (preg_match($regexPattern, $uri, $params)) {
                array_shift($params);
                if (is_callable($callback)) {
                    return call_user_func_array($callback, $params);
                } else {
                    list($controller, $method) = $callback;
                    $instance = new $controller();
                    return $instance->$method(...$params);
                }
            }
        }
        return '404 Not Found';
    }
    
}    