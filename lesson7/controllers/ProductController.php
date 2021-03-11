<?php

namespace app\controllers;

use app\models\{Product, Menu, Comment, Cart};
use app\core\{Session, Request};

class ProductController
{
    public function showCatalogAction(Request $request, Session $session, $params)
    {
        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        $data['products'] = (new Product())->getProducts();
        $data['tplName'] = 'catalog';
        $data['pageTitle'] = 'Каталог';
        $data['menuActive'] = 'products';
        $data['startId'] = PROD_PER_PAGE;
        $data['menu'] = (new Menu())->getMenu();

        return $data;
    }

    public function showProductAction(Request $request, Session $session, $params)
    {
        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        $data['product'] = (new Product())->getOne($params['id']);
        $data['comments'] = (new Comment())->getAllComments($params['id']);
        $data['formAction'] = 'add';
        $data['commentMsg'] = $_SESSION['commentMsg'] ?? null;
        unset($_SESSION['commentMsg']);
        $data['buttonName'] = 'Отправить';
        $data['tplName'] = 'product';
        $data['pageTitle'] = 'Каталог';
        $data['menuActive'] = 'products';
        $data['menu'] = (new Menu())->getMenu();

        return $data;
    }

    public function addProductsToPageAction(Request $request, Session $session, $params)
    {
        if ($data = $request->json) {
            $jsonResp = ''; 
            $arrForJson = [];

            $start = isset($data['startId']) ? $data['startId'] : 0; 
            $arrForJson['products'] = (new Product())->getProducts($start);
            $arrForJson['startId'] = $start + PROD_PER_PAGE;

            if (!empty($arrForJson['products'])) {
                $arrForJson['status'] = 'ok';
            } else {
                $arrForJson['status'] = 'false';
                $arrForJson['startId'] = 'false';
            }

            $jsonResp = json_encode($arrForJson);

            echo $jsonResp;
            exit();
        }
    }
}
