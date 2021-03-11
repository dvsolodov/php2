<?php

session_start();

include dirname(__DIR__) . '/config/config.php';
// Убран собственный автозагрузчик. 
// Работает автозагрузчик /vendor/aunoload.php
//include ROOT . '/core/Autoload.php';
include ROOT . '/library/functions.php';
require_once ROOT . '/vendor/autoload.php';

use app\core\{Autoload, Render, TwigRender, Session, Request};
use app\routing\Router;
use app\controllers\NotFoundController;

use app\models\User;

try {
    spl_autoload_register([new Autoload, 'loadClass']);

    $request = new Request();
    $session = new Session();

    if (!isset($session->buyerId)) {
        $session->buyerId = session_id();
    }

    // Получить имя контроллера и его метода, а также параметры для работы метода 
    $router = new Router($request);

    $controllerName = "app\\controllers\\" . $router->controller . "Controller";
    $actionName = $router->action . 'Action';
    $params = $router->params;

    // Запустить метод контроллера для получения данных для отрисовки страницы
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        $pageData = (new $controllerName)->$actionName($request, $session, $params);
    } else {
        $pageData = (new NotFoundController)->indexAction($request, $session, $params);
    }

    //var_dump($pageData);
    //var_dump($controllerName);
    //var_dump($actionName);
    //var_dump($params);
    //var_dump($_SESSION);
    //var_dump($session);
    //var_dump(session_id());

    // Отрисовать страницу (при необходимости)
    echo (new TwigRender($pageData))->pageRender();

} catch (\PDOException $exception) {
    var_dump($exception->getMessage());

} catch (\Exception $exception) {
    var_dump($exception->getTrace());
}
