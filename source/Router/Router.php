<?php

class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = ltrim($path, '/');
        $path = ltrim($path, 'projeto-medmur');
    
        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            if (is_callable($callback)) {
                call_user_func($callback);
            } elseif (is_array($callback)) {
                $controller = new $callback[0]();
                $action = $callback[1];
                $controller->$action();
            }
        } else {
           // echo "Página não encontrada!";
            header("Location:". parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        }
    }
    
}
