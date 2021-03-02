<?php

namespace app\controllers;

use app\models\Menu;

class HomeController
{
    public function indexAction($params)
    { 
        $pageData['tplName'] = 'home';
        $pageData['userName'] = isset($_SESSION['user']['login']) ? $_SESSION['user']['login'] : 'гость';
        $pageData['menu'] = (new Menu())->getMenu(); 
        $pageData['menuActive'] = 'home';
        $pageData['pageTitle'] = 'Главная';

        return $pageData;
    }
}
