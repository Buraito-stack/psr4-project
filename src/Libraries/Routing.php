<?php

namespace MiniMarkPlace\Libraries;

class Routing
{
    protected array $routes = [];

    public function add(string $method, string $route, $callback): void
    {
        $this->routes[$method][$route] = $callback;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Default response if no route matches
        $response = '404 Not Found';

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $callback) {

                // Ganti :id dengan (\d+) untuk menangkap parameter ID
                $regexPattern = str_replace(['/', ':id'], ['\/', '(\d+)'], $route);              
                $regexPattern = "#^{$regexPattern}$#";

                if (preg_match($regexPattern, $uri, $params)) {
                    array_shift($params); 
                    
                    if (is_callable($callback)) {
                        $response = call_user_func_array($callback, $params);
                    } else {
                        [$controller, $method] = $callback;
                        $instance = new $controller();
                        $response = $instance->$method(...$params);
                    }

                    break; 
                }
            }
        }

        return $response;
    }
}
