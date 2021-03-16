<?php

namespace app\controllers;

use app\core\{Session, Request};
use app\models\entities\{Menu, Cart};
use app\models\repositories\{MenuRepository, CartRepository};

class HomeController
{
    public function indexAction(Request $request, Session $session, $params)
    { 
        $pageData['count'] = (new CartRepository())->getCount($session)[0]['count'];
        $pageData['tplName'] = 'home';
        $pageData['userName'] = isset($session->userLogin) ? $session->userLogin : 'гость';
        $pageData['menu'] = (new MenuRepository())->getMenu(); 
        $pageData['menuActive'] = 'home';
        $pageData['pageTitle'] = 'Главная';

        return $pageData;
    }
}
