<?php

namespace app\controllers;

use app\models\{Menu, Cart};
use app\core\{Session, Request};

class NotFoundController
{
    public function indexAction(Request $request, Session $session, $params)
    {
        $data['tplName'] = 'page404';
        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        //$data['menuActive'] = 'home';
        $data['menu'] = (new Menu())->getMenu();

        return $data;
    }
}
