<?php

namespace app\controllers;

use app\models\Menu;

class HomeController
{
    public function indexAction($params)
    { 
        $pageData['tplName'] = 'home';
        $pageData['userName'] = 'гость';
        $pageData['menu'] = (new Menu())->getMenu('guest_menu'); 
        $pageData['menuActive'] = 'home';
        $pageData['pageTitle'] = 'Главная';

        return $pageData;
    }
}
