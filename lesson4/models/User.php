<?php

namespace app\models;

class User extends Model
{
    protected $login;
    protected $password;
    protected $reg_date;

    public function __construct($login = null, $password = null, $reg_date = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->reg_date = $reg_date;
    }

    public function getTableName()
    {
        return 'users';
    }
}
