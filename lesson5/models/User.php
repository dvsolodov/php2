<?php

namespace app\models;

use app\core\Db;

class User extends Model
{
    protected $login;
    protected $password;
    protected $reg_date;
    protected $buyer_id;
    protected $remember;

    public function __construct(
        $login = null, 
        $password = null, 
        $reg_date = null, 
        $buyer_id = null, 
        $remember = null
    ) {
        $this->login = $login;
        $this->password = $password;
        $this->reg_date = $reg_date;
        $this->buyer_id = $buyer_id;
        $this->remember = $remember;
    }

    public function getOneByLogin($login)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `login` = :login";

        return Db::getInstance()->queryOne($sql, ['login' => $login]);
    }

    public function getOneByCOOKIE($cookie)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `remember` = :remember";

        return Db::getInstance()->queryOne($sql, ['remember' => $cookie]);
    }

    public static function isAuth()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    public function getTableName()
    {
        return 'users';
    }
}
