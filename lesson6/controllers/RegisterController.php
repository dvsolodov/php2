<?php

namespace app\controllers;

use app\models\{Menu, User, Cart};
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
        $data['count'] = (new Cart())->getCount($session)[0]['count'];
        $data['menuActive'] = 'register';
        $data['menu'] = (new Menu())->getMenu('guest_menu');

        if (isset($request->post['reg'])) {
            $login = isset($request->post['login']) ? clearString($request->post['login']) : '';
            $password = isset($request->post['password']) ? clearString($request->post['password']) : '';
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $regDate = time();
            $buyerId = uniqId(rand(), true);

            $user = new User($login, $passwordHash, $regDate, $buyerId);

            $loginPattern = '#^[A-Za-z0-9]{' . MIN_LOGIN . ',' . MAX_LOGIN . '}$#';
            $passPattern = '#^[A-Za-z0-9]{' . MIN_PASS . ',' . MAX_PASS . '}$#';
            $checkLogin = preg_match($loginPattern, $login) === 1;
            $checkPassword = preg_match($passPattern, $password) === 1;


            if (!$checkLogin || !$checkPassword) {
                $data['regMsg'] = 'Неправильный формат логина или пароля. Смотрите подсказки в форме.';
            } elseif ($user->getOneBy('login')->id) {
                $data['regMsg'] = 'Пользователь с таким логином уже зарегистрирован.';
            } elseif (!$user->insert()->id) {
                $data['regMsg'] = 'Что-то пошло не так.';
            } else {
                $session->userLogin = $user->login;
                $session->userId = $user->id;
                $session->buyerId = $user->buyer_id;

                if (!empty($request->post['remember'])) {
                    $user->remember = uniqId(rand(), true);
                    $user->update();
                }

                header('Location: /');
                exit();
            }

            $data['login'] = $login;
        }

        return $data;
    }
}
