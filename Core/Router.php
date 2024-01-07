<?php

namespace Core;

class Router
{
    private $routes = [];

    private function route_template($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->route_template($uri, $controller, "GET");
    }

    public function post($uri, $controller)
    {
        $this->route_template($uri, $controller, "POST");
    }

    public function delete($uri, $controller)
    {
        $this->route_template($uri, $controller, "DELETE");
    }

    public function patch($uri, $controller)
    {
        $this->route_template($uri, $controller, "PATCH");
    }

    public function put($uri, $controller)
    {
        $this->route_template($uri, $controller, "PUT");
    }

    public function route($uri, $method)
    {
        $correct_uri = false;
        $corrrect_method = false;
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri) {
                $correct_uri = true;
                if ($route["method"] === $method) {
                    $corrrect_method = true;
                    break;
                }
            }
        }
        if ($correct_uri && $corrrect_method) {
            return require(base_path($route["controller"]));
        } else if (!$correct_uri) {
            abort(Response::NOT_FOUND, "Resource is not found.");
        } else if ($correct_uri && !$corrrect_method) {
            abort(Response::METHOD_NOT_ALLOWED, "Request method is not allowed.");
        }
    }
}
