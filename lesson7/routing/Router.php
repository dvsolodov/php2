<?php

namespace app\routing;

use app\core\Request;

class Router
{
    public $controller;
    public $action;
    public $params = [];

    public function __construct(Request $request)
    {
        $routes = include ROOT . '/routing/routes.php';

        foreach ($routes as $pattern => $route) {
            if (preg_match('#^/' . $pattern . '$#', $request->uri, $matches)) {
                $routeArr = explode('/', $route);

                $this->controller = $routeArr[0];
                $this->action = $routeArr[1];
                $this->params = $matches;

                break;
            }
        }

        return $this;
    }
}
