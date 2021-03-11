<?php

session_start();

include dirname(__DIR__) . '/config/config.php';
include dirname(__DIR__) . '/core/Autoload.php';
include dirname(__DIR__) . '/library/functions.php';

use app\core\{Autoload, Render};
use app\routing\Router;
use app\controllers\NotFoundController;

use app\models\User;

spl_autoload_register([new Autoload, 'loadClass']);

// Код для проверки работы фильтрации измененных свойств
/*
$user = (new User())->getOneObject(26);
var_dump($user);
echo '<br>';
$user->login = 'User';
var_dump($user->changedProps);
$user->update();
var_dump($user->changedProps);die;
 */

// Получить имя контроллера и его метода, а также параметры для работы метода 
$router = new Router($_SERVER['REQUEST_URI']);

$controllerName = "app\\controllers\\" . $router->controller . "Controller";
$actionName = $router->action . 'Action';
$params = $router->params;

// Запустить метод контроллера для получения данных для отрисовки страницы
if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
    $pageData = (new $controllerName)->$actionName($params);
} else {
    $pageData = (new NotFoundController)->indexAction($params);
}

//var_dump($pageData, $controllerName, $actionName, $params);

// Отрисовать страницу (при необходимости)
echo (new Render($pageData))->pageRender();
