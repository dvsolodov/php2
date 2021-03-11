<?php

namespace app\controllers;

use app\core\{Request, Session};
use app\models\repositories\OrderRepository;
use app\models\entities\Order;
use app\models\{User, Cart, Product, Menu};

class OrderController
{
    function addOrderAction(Request $request, Session $session, $params)
    {
        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        $data['tplName'] = 'orders';
        $data['pageTitle'] = 'Заказы';
        $data['menuActive'] = User::isAuth() ? 'myorders' : 'cart';
        $data['menu'] = (new Menu())->getMenu();

        $buyerId = $session->buyerId;

        if (User::isAuth()) {
            $userId = $session->userId;
        } else {
            $userId = null;
        }

        $status = 1;

        if (isset($request->post['order'])) {
            if (empty($request->post['phone']) || empty($request->post['name'])) {
                $params['orderMsg'] = 'Заполните все поля формы';
                return $this->showFormAction($request, $session, $params);
            } else {
                $phone = clearString($request->post['phone']);
                $buyerName = clearString($request->post['name']);

                $order = new Order($buyerName, $phone, $userId, $buyerId, $status);
                
                if (!$order = (new OrderRepository())->save($order)) {
                    $params['orderMsg'] = 'Что-то пошло не так!!';
                    return $this->showFormAction($request, $session, $params);
                }
            }

            $params['oldBuyerId'] = $session->buyerId;
            $params['msg'] = 'Заказ создан.';
            $session->regenerate();

            if (User::isAuth()) {
                $user = new User();
                $user->id = $session->userId;
                $user->buyer_id = $session->buyerId;
                $user->save();
            }

            return $this->showAllOrdersAction($request, $session, $params);
        }

    }

    public function showFormAction(Request $request, Session $session, $params)
    {
        if (isset($params['orderMsg'])) {
            $data['orderMsg'] = $params['orderMsg'];
        }

        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        $data['tplName'] = 'orderForm';
        $data['pageTitle'] = 'Оформление заказа';
        $data['menuActive'] = 'myorder';
        $data['menu'] = (new Menu())->getMenu();
        
        return $data;
    }

    public function showAllOrdersAction(Request $request, Session $session, $params)
    {
        $userId = $session->userId ?? null;
        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        $data['tplName'] = 'orders';
        $data['pageTitle'] = 'Мои заказы';
        $data['menuActive'] = 'myorders';
        $data['menu'] = (new Menu())->getMenu();
        $data['orderMsg'] = isset($params['msg']) ? $params['msg'] : null;

        if (User::isAuth()) {
            $data['orders'] = (new OrderRepository())->getAllOrders(null, $userId);
        } else {
            $data['orders'] = (new OrderRepository())->getAllOrders($params['oldBuyerId']);
        }

        return $data;
    }

    public function showCartOfOrderAction(Request $request, Session $session, $params)
    {
        $cart = (new OrderRepository())->getCartOfOrder($params['orderId']);
        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        $data['tplName'] = 'orderCart';
        $data['pageTitle'] = 'Заказ';
        $data['orderNumber'] = $params['orderId'];
        $data['menuActive'] = 'myorders';
        $data['menu'] = (new Menu())->getMenu();
        $data['products'] = $cart;

        return $data;
    }
}
