<?php

namespace app\models;

class User extends Model
{
    protected int $id;
    protected string $login;
    protected string $password;
    protected int $reg_date;

    public function __construct(string $login, string $password, int $reg_date)
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
