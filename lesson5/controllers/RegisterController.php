<?php

namespace app\controllers;

use app\models\{Menu, User};

class RegisterController
{
    function registerAction()
    {
        if (User::isAuth()) {
            header('Location: /');
            exit();
        }

        $data['tplName'] = 'register';
        $data['menuActive'] = 'register';
        $data['menu'] = (new Menu())->getMenu('guest_menu');

        if (isset($_POST['reg'])) {
            $login = isset($_POST['login']) ? clearString($_POST['login']) : '';
            $password = isset($_POST['password']) ? clearString($_POST['password']) : '';
            $regDate = time();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $buyerId = uniqId(rand(), true);

            $loginPattern = '#[A-Za-z0-9]{' . MIN_LOGIN . ',' . MAX_LOGIN . '}#';
            $passPattern = '#[A-Za-z0-9]{' . MIN_PASS . ',' . MAX_PASS . '}#';
            $checkLogin = preg_match($loginPattern, $login) === 1;
            $checkPassword = preg_match($passPattern, $password) === 1;

            $data['login'] = $login;
            $user = new User($login, $passwordHash, $regDate, $buyerId);

            if (!$checkLogin || !$checkPassword) {
                $data['regMsg'] = 'Неправильный формат логина или пароля. Смотрите подсказки в форме.';

            } elseif ($user->getOneByLogin($login)) {
                $data['regMsg'] = 'Пользователь с таким логином уже зарегистрирован.';
            } elseif (!$userId = $user->insert()) {
                    $data['regMsg'] = 'Что-то пошло не так.';
            } else {
                $_SESSION['user']['login'] = $login;
                $_SESSION['user']['id'] = $userId;
                $_SESSION['buyer_id'] = $buyerId;

                if (!empty($_POST['remember'])) {
                    $user->remember = uniqId(rand(), true);
                    $user->update();
                }

                header('Location: /');
                exit();
            }
        }

        return $data;
    }
}
