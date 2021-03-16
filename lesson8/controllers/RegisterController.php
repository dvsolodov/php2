<?php

namespace app\controllers;

use app\models\entities\{Menu, User, Cart};
use app\models\repositories\{MenuRepository, UserRepository, CartRepository};
use app\core\{Session, Request};

class RegisterController
{
    function registerAction(Request $request, Session $session, $params)
    {
        if (User::isAuth()) {
            header('Location: /');
            exit();
        }

        $data['tplName'] = 'register';
        $data['count'] = (new CartRepository())->getCount($session)[0]['count'];
        $data['menuActive'] = 'register';
        $data['menu'] = (new MenuRepository())->getMenu('guest_menu');

        if (isset($request->post['reg'])) {
            $login = isset($request->post['login']) ? clearString($request->post['login']) : '';
            $password = isset($request->post['password']) ? clearString($request->post['password']) : '';
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $regDate = time();
            $buyerId = uniqId(rand(), true);

            $user = new User($login, $passwordHash, $regDate, $buyerId, null, 1);
            $userRepo = new UserRepository();

            $loginPattern = '#^[A-Za-z0-9]{' . MIN_LOGIN . ',' . MAX_LOGIN . '}$#';
            $passPattern = '#^[A-Za-z0-9]{' . MIN_PASS . ',' . MAX_PASS . '}$#';
            $checkLogin = preg_match($loginPattern, $login) === 1;
            $checkPassword = preg_match($passPattern, $password) === 1;

            if (!$checkLogin || !$checkPassword) {
                $data['regMsg'] = 'Неправильный формат логина или пароля. Смотрите подсказки в форме.';
            } elseif ($userRepo->getOneBy($user, 'login')) {
                $data['regMsg'] = 'Пользователь с таким логином уже зарегистрирован.';
            } elseif (!$userRepo->save($user)) {
                $data['regMsg'] = 'Что-то пошло не так.';
            } else {
                $user = $userRepo->getOneBy($user, 'login');
                $session->userLogin = $user->login;
                $session->userId = $user->id;
                $session->buyerId = $user->buyer_id;

                if (!empty($request->post['remember'])) {
                    $user->remember = uniqId(rand(), true);
                    $userRepo->save($user);
                }

                header('Location: /');
                exit();
            }

            $data['login'] = $login;
        }

        return $data;
    }
}
