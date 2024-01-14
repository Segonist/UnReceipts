<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router
{
    private $routes = [];

    private function route_template($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            "middleware" => NULL
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->route_template($uri, $controller, "GET");
    }

    public function post($uri, $controller)
    {
        return $this->route_template($uri, $controller, "POST");
    }

    public function delete($uri, $controller)
    {
        return $this->route_template($uri, $controller, "DELETE");
    }

    public function patch($uri, $controller)
    {
        return $this->route_template($uri, $controller, "PATCH");
    }

    public function put($uri, $controller)
    {
        return $this->route_template($uri, $controller, "PUT");
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        $correct_uri = false;
        $correct_method = false;
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri) {
                $correct_uri = true;
            } else {
                continue;
            }
            if ($route["method"] === $method) {
                $correct_method = true;
            } else {
                continue;
            }
            Middleware::resolve($route["middleware"]);
            break;
        }
        if ($correct_uri && $correct_method) {
            return require(base_path($route["controller"]));
        } else if (!$correct_uri) {
            abort(Response::NOT_FOUND, "Resource is not found.");
        } else if ($correct_uri && !$correct_method) {
            abort(Response::METHOD_NOT_ALLOWED, "Request method is not allowed.");
        }
    }
}
