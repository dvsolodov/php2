<?php

namespace app\controllers;

use app\models\entities\{User, Menu, Cart};
use app\models\repositories\{UserRepository, MenuRepository, CartRepository};
use app\core\{Session, Request};

class AuthController
{
    function loginAction(Request $request, Session $session, $params)
    {
        if (User::isAuth()) {
            header('Location: /');
            exit();
        }

        $data['count'] = (new CartRepository())->getCount($session)[0]['count'];
        $data['tplName'] = 'login';
        $data['menuActive'] = 'login';
        $data['menu'] = (new MenuRepository())->getMenu();

        if (isset($request->post['auth'])) {
            $login = isset($request->post['login']) ? clearString($request->post['login']) : null;
            $password = isset($request->post['password']) ? clearString($request->post['password']) : null;
            $remember = $_COOKIE['auth'] ?? null; 
            $user = new User($login, null, null, null, $remember);
            $userRepo = new UserRepository();
            $data['login'] = $login;

            $checkFields = $this->checkFormFields($user, $login, $password);
                
            if ($checkFields) {
                if (!empty($request_post['remember'])) {
                    $user->remember = uniqId(rand(), true);
                    $userRepo->save($user);
                }

                $session->userId = $user->id;
                $session->userLogin = $user->login;
                $session->buyerId = $user->buyer_id;

                header('Location: /');
                exit();
            }
        }

        return $data;
    }

    function logoutAction(Request $request, Session $session, $params)
    {
        if (isset($session->userId)) {
            $user = new User();
            $user->id = $session->userId;
            (new UserRepository())->getOneBy($user, 'id');
            $user->remember = NULL;
            (new UserRepository())->save($user);
            $session->deleteParam('userId');
            $session->deleteParam('userLogin');
        }

        if (isset($session->buyerId)) {
            session_regenerate_id(delete_old_session);
            $session->deleteParam('buyerId');
        }

        header('Location: /');
        exit();
    }

    protected function checkFormFields(User &$user, $login, $password)
    {
        $authMsg;

        if (empty($login) || empty($password)) {
            $authMsg = 'Заполните все поля формы';
        } elseif ($user = (new UserRepository())->getOneBy($user, 'login')) {
            $auth = password_verify($password, $user->password); 
        }

        if (!$auth) {
            $authMsg = 'Неправильный логин или пароль';
        }

        return $authMsg ?? true;
    }
}
