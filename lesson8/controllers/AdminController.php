<?php

namespace app\controllers;

use app\core\{Request, Session};
use app\models\entities\{Admin, Menu, Cart};
use app\models\repositories\{
    AdminRepository, 
    OrderRepository,
    MenuRepository,
    CartRepository
};

class AdminController
{
    public function showAuthFormAction(Request $request, Session $session, $params)
    {
        $isAdmin = (new Admin())->isAdmin($session);

        if ($isAdmin) {
            header('Location: /admin/panel');
            exit();
        }

        $data['authMsg'] = $params['authMsg'] ?? null;
        $data['login'] = $params['login'] ?? null;
        $data['isAdmin'] = $isAdmin;
        $data['tplName'] = 'admin/adminAuth';
        $data['menu'] = (new MenuRepository())->getMenu('admin_menu');

        return $data;
    }

    public function loginAction(Request $request, Session $session, $params)
    {
        $login = $request->post['login'] ?? null;
        $password = $request->post['password'] ?? null;
        $adminRepo = new AdminRepository();
        $admin = $adminRepo->getOneByLogin($login);
        $error = false;

        if (!$adminRepo->auth($request, $session)) {
            $params['authMsg'] = 'Неправильный логин или пароль!!!';
            $params['login'] = $login;
            return $this->showAuthFormAction($request, $session, $params);
        }

        $session->adminId = $admin->id;
        $session->adminLogin = $admin->login;

        header('Location: /admin/panel');
        exit();
    }

    public function showPanelAction(Request $request, Session $session, $params)
    {
        $isAdmin = Admin::isAdmin($session);

        if (!$isAdmin) {
            header('Location: /admin');
            exit();
        }

        $data['tplName'] = 'admin/adminPanel';
        $data['menu'] = (new MenuRepository())->getMenu('admin_menu');
        $data['isAdmin'] = $isAdmin;
        $data['orders'] = (new OrderRepository())->getAllOrdersForAdmin($session);
        $data['statuses'] = (new OrderRepository())->getAllStatusesOfOrder();

        return $data;
    }

    function updateOrderStatusAction(Request $request, Session $session, $params)
    {
        if (!Admin::isAdmin($session)) {
            header('Location: /');
            exit();
        }

        if ($data = $request->json) { 
            $jsonResp = []; 
            $arrForJson = [];

            if ((new OrderRepository())->updateStatus($data['statusId'], $data['orderId'])) {
                $arrForJson['status'] = 'ok';
            } else {
                $arrForJson['status'] = 'bed';
            }

            $jsonResp['json'] = json_encode($arrForJson);

            return $jsonResp;
        }
    }

    public function showCartOfOrderAction(Request $request, Session $session, $params)
    {
        $data['tplName'] = 'admin/adminCartOfOrder';
        $data['menu'] = (new MenuRepository())->getMenu('admin_menu');
        $data['isAdmin'] = Admin::isAdmin($session);
        $data['cart'] = (new CartRepository())->getOneCartOfOrder($params['orderId']);
        $data['orderId'] = $params['orderId'];

        return $data;
    }

    public function logoutAction(Request $request, Session $session, $params)
    {
        if (isset($session->adminId)) {
            $session->adminId = null;
            $session->adminLogin = null;
        }

        header('Location: /admin');
        exit();
    }
}

