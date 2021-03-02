<?php

namespace app\controllers;

use app\models\{Product, Menu, Comment};

class ProductController
{
    public function showCatalogAction($params)
    {
        $data['products'] = (new Product())->getProducts();
        $data['tplName'] = 'catalog';
        $data['pageTitle'] = 'Каталог';
        $data['menuActive'] = 'products';
        $data['startId'] = PROD_PER_PAGE;
        $data['menu'] = (new Menu())->getMenu('guest_menu');

        return $data;
    }

    public function showProductAction($params)
    {
        $data['product'] = (new Product())->getOne($params['id']);
        $data['comments'] = (new Comment())->getAllComments($params['id']);
        $data['formAction'] = 'add';
        $data['commentMsg'] = $params['commentMsg'] ?? null;
        $data['buttonName'] = 'Отправить';
        $data['tplName'] = 'product';
        $data['pageTitle'] = 'Каталог';
        $data['menuActive'] = 'products';
        $data['menu'] = (new Menu())->getMenu('guest_menu');

        return $data;
    }

    public function addProductsToPageAction()
    {
        if ($jsonReq= file_get_contents('php://input')) {
            $data = json_decode($jsonReq, true);
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
