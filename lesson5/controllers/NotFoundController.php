<?php

namespace app\controllers;

use app\models\Menu;

class NotFoundController
{
    public function indexAction()
    {
        $data['tplName'] = 'page404';
        //$data['menuActive'] = 'home';
        $data['menu'] = (new Menu())->getMenu();

        return $data;
    }
}
