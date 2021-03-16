<?php

namespace app\controllers;

use app\models\{User, Menu};

class AuthController
{
    function loginAction()
    {
        if (User::isAuth()) {
            header('Location: /');
            exit();
        }

        $data['tplName'] = 'login';
        $data['menuActive'] = 'login';
        $data['menu'] = (new Menu())->getMenu();

        if (isset($_POST['auth'])) {
            $login = isset($_POST['login']) ? clearString($_POST['login']) : null;
            $password = isset($_POST['password']) ? clearString($_POST['password']) : null;
            $data['authMsg'] = 'Неправильный логин или пароль';
            $data['login'] = $login;
            $auth = false;

            if (empty($login) || empty($password)) {
                $data['authMsg'] = 'Заполните все поля формы';
            } elseif (isset($_COOKIE['auth']) && ((new User())->getUserByCookie($_COOKIE['auth']))) {
                $auth = true; 
            } elseif ($userId = (new User())->getOneByLogin($login)) {
                $user = (new User())->getOneObject($userId['id']);
                $auth = password_verify($password, $user->password); 
            }
                
            if ($auth) {
                if (!empty($_POST['remember'])) {
                    $user->remember = uniqId(rand(), true);
                    $user->update();
                }

                $_SESSION['user']['id'] = $user->id;
                $_SESSION['user']['login'] = $user->login;
                $_SESSION['buyer_id'] = $user->buyer_id;

                header('Location: /');
                exit();
            }
        }

        return $data;
    }

    function logoutAction()
    {
        if (isset($_SESSION['user'])) {
            $userId = (new User())->getOne($_SESSION['user']['id'])['id'];
            $user = (new User())->getOneObject($userId);
            $user->remember = NULL;
            $user->update();
            unset($_SESSION['user']);
        }

        if (isset($_SESSION['buyer_id'])) {
            $_SESSION['buyer_id'] = uniqid(rand(), true);
        }

        header('Location: /');
        exit();
    }
}
