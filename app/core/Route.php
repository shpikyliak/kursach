<?php


class Route
{
    static function start()
    {

        // default
        $controllerName = 'main';
        $actionName = 'index';


        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $routesCon = explode('?',$routes[1]);
        $routesAct = explode('?',$routes[2]);
        // get contoler name
        if (!empty($routesCon[0])) {
            $controllerName = $routesCon[0];
        }

        // get action name
        if (!empty($routesAct[0])) {

            $actionName = $routesAct[0];
        }

        $controllerName[0] = strtoupper($controllerName[0]);
        $actionName[0] = strtoupper($actionName[0]);

        // make names
        $model_name = 'Model' . $controllerName;
        $controllerName = 'Controller' . $controllerName;
        $actionName = 'action' . $actionName;

        // include model fie

        $model_file = $model_name . '.php';
        $model_path = "app/models/" . $model_file;
        if (file_exists($model_path)) {
            include "app/models/" . $model_file;
        }

        // include controller file
        $controllerFile = $controllerName . '.php';
        $controllerPath = "app/controllers/" . $controllerFile;
        if (file_exists($controllerPath)) {
            include "app/controllers/" . $controllerFile;
        } else {
            exit('<h3>404! Page don\'t found</h3>');
        }
        //make controller
        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            var_dump($action);
            exit('<h3>404! Page don\'t found</h3>');
        }
    }


}
