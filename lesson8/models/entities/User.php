<?php

namespace app\models\entities;

use app\core\Session;
use app\models\Model;

class User extends Model
{
    protected $login;
    protected $password;
    protected $reg_date;
    protected $buyer_id;
    protected $remember;
    protected $role_id;

    protected $changedProps = [
        'login' => false,
        'password' => false,
        'reg_date' => false,
        'buyer_id' => false,
        'remember' => false,
        'role_id' => false
    ];

    public function __construct(
        $login = null, 
        $password = null, 
        $reg_date = null, 
        $buyer_id = null, 
        $remember = null,
        $role_id = null
    ) {
        $this->login = $login;
        $this->password = $password;
        $this->reg_date = $reg_date;
        $this->buyer_id = $buyer_id;
        $this->remember = $remember;
        $this->role_id = $role_id;
    }

    public static function isAuth()
    {
        if (isset((new Session())->userId)) {
            return true;
        }

        return false;
    }
}

