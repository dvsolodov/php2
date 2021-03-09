<?php

namespace app\controllers;

use app\models\{Menu, Cart};
use app\core\{Session, Request};

class HomeController
{
    public function indexAction(Request $request, Session $session, $params)
    { 
        $pageData['count'] = (new Cart())->getCount($session)[0]['count'];
        $pageData['tplName'] = 'home';
        $pageData['userName'] = isset($session->userLogin) ? $session->userLogin : 'гость';
        $pageData['menu'] = (new Menu())->getMenu(); 
        $pageData['menuActive'] = 'home';
        $pageData['pageTitle'] = 'Главная';

        return $pageData;
    }
}
