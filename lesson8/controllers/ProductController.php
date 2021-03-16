<?php

namespace app\controllers;

use app\models\repositories\{ProductRepository, MenuRepository, CommentRepository, CartRepository};
use app\core\{Session, Request};

class ProductController
{
    public function showCatalogAction(Request $request, Session $session, $params)
    {
        $data['count'] = (new CartRepository())->getCount($session)[0]['count'];
        $data['products'] = (new ProductRepository())->getProducts();
        $data['tplName'] = 'catalog';
        $data['pageTitle'] = 'Каталог';
        $data['menuActive'] = 'products';
        $data['startId'] = PROD_PER_PAGE;
        $data['menu'] = (new MenuRepository())->getMenu();

        return $data;
    }

    public function showProductAction(Request $request, Session $session, $params)
    {
        $data['count'] = (new CartRepository())->getCount($session)[0]['count'];
        $data['product'] = (new ProductRepository())->getOne($params['id']);
        $data['comments'] = (new CommentRepository())->getAllComments($params['id']);
        $data['formAction'] = 'add';
        $data['commentMsg'] = $_SESSION['commentMsg'] ?? null;
        unset($_SESSION['commentMsg']);
        $data['buttonName'] = 'Отправить';
        $data['tplName'] = 'product';
        $data['pageTitle'] = 'Каталог';
        $data['menuActive'] = 'products';
        $data['menu'] = (new MenuRepository())->getMenu();

        return $data;
    }

    public function addProductsToPageAction(Request $request, Session $session, $params)
    {
        if ($data = $request->json) {
            $jsonResp = ''; 
            $arrForJson = [];

            $start = isset($data['startId']) ? $data['startId'] : 0; 
            $arrForJson['products'] = (new ProductRepository())->getProducts($start);
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

