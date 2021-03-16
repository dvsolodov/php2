<?php

namespace app\controllers;

use app\models\repositories\{CartRepository, MenuRepository, ProductRepository};
use app\models\entities\Cart;
use app\core\{Session, Request};

class CartController
{
    public function showCartAction(Request $request, Session $session, $params)
    {
        $cart = new CartRepository();
        $menu = new MenuRepository();
        $buyerId = $session->buyerId;
        $userId = $session->userId ?? null;
        $data['products'] = $cart->getOneCart($buyerId, $userId);
        $data['count'] = $cart->getCount($session)[0]['count'];
        $data['tplName'] = 'cart';
        $data['menuActive'] = 'cart';
        $data['menu'] = $menu->getMenu();

        return $data;
    }

    public function addProductToCartAction(Request $request, Session $session, $params)
    {
        if ($data = $request->json) {
            $jsonResp = ''; 
            $arrForJson = [];

            $product = (new ProductRepository())->getOneObject($data['productId']);
            $cart = new Cart(
                $product->id, 
                $data['productQuant'], 
                $product->price,
                $session->userId,
                $session->buyerId
            ); 

            $cartRepo = new CartRepository();

            if (!empty($cartRepo->save($cart))) {
                $arrForJson['status'] = 'ok';
                $arrForJson['buyMsg'] = 'Товар добавлен в корзину';
            } else {
                $arrForJson['status'] = 'false';
                $arrForJson['buyMsg'] = 'Что-то пошло не так. Попробуйте еще раз.';
            }

            $arrForJson['count'] = $cartRepo->getCount($session)[0]['count'];

            $jsonResp = json_encode($arrForJson);

            echo $jsonResp;
            exit();
        }
    }

    public function deleteProductFromCartAction(Request $request, Session $session, $params)
    {
        if ($data = $request->json) {
            $jsonResp = ''; 
            $arrForJson = [];

            $cart = new Cart();
            $cart->id = !is_numeric($data['productId']) ? : $data['productId'];
            $cartRepo = new CartRepository();

            if ($data['productId'] == 'all') {

                if ($cartRepo->deleteAllGoods($session->buyerId)) {
                    $arrForJson['status'] = 'all';
                }

            } elseif ($cartRepo->delete($cart) > 0) {
                $arrForJson['status'] = 'ok';
            }

            $arrForJson['count'] = $cartRepo->getCount($session)[0]['count'];

            $jsonResp = json_encode($arrForJson);

            echo $jsonResp;
            exit();
        }
    }
}
