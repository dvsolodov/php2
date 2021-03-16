<?php

session_start();

include dirname(__DIR__) . '/config/config.php';
include ROOT . '/core/Autoload.php';
include ROOT . '/library/functions.php';
require_once ROOT . '/vendor/autoload.php';

use app\core\{Autoload, Render, TwigRender, Session, Request};
use app\routing\Router;
use app\controllers\NotFoundController;

use app\models\User;

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

//var_dump($pageData, $controllerName, $actionName, $params, $_SESSION);

// Отрисовать страницу (при необходимости)
echo (new TwigRender($pageData))->pageRender();
