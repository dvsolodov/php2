<?php

namespace app\models\repositories;

use app\models\{User, Repository, Model};
use app\core\{Db, Request, Session};
use app\models\entities\Admin;


class AdminRepository extends Repository
{
    public function getTableName()
    {
        return 'users';
    }

    public function getEntityClass()
    {
        return Admin::class;
    }

    public function auth(Request $request, Session $session)
    {
        $login = $request->post['login'] ?? null;
        $password = $request->post['password'] ?? null;
        $admin = $this->getOneByLogin($login);

        if (empty($login) || empty($password)) {
            $auth = false;
        } elseif (!$admin) {
            $auth = false;
        } else {
            $auth = password_verify($password, $admin->password);
        }

        return $auth;
    }

//CRUD Active Record
    public function getOneByLogin($login)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `login` = :login AND `role_id` = 2";

        return Db::getInstance()->queryOneObject($sql, ['login' => $login], $this->getEntityClass());
    }
//END CRUD
}

