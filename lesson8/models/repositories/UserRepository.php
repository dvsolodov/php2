<?php

namespace app\models\repositories;

use app\core\{Db, Session, Request};
use app\models\Repository;
use app\models\entities\User;

class UserRepository extends Repository
{
    public function getOneByLogin($entity, $login)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `login` = :login AND `role_id` = 1";

        return Db::getInstance()->queryOne($sql, ['login' => $entity->login]);
    }

    public function getOneByCOOKIE($cookie)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `remember` = :remember AND `role_id` = 1";

        return Db::getInstance()->queryOne($sql, ['remember' => $cookie]);
    }

    public function getTableName()
    {
        return 'users';
    }

    public function getEntityClass()
    {
        return User::class;
    }
}

