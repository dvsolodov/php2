<?php

namespace app\models;

use app\core\Db;
use app\models\User;

class Menu extends Model
{
    public function getMenu($whoseMenu = null)
    {
        $tableName = $this->getTableName();

        if ($whoseMenu !== null) {
            $sql = "SELECT `name`, `link` FROM {$tableName} WHERE `{$whoseMenu}` > 0";
        } elseif (User::isAuth()) {
            $sql = "SELECT `name`, `link` FROM {$tableName} WHERE `user_menu` > 0";
        } else {
            $sql = "SELECT `name`, `link` FROM {$tableName} WHERE `guest_menu` > 0";
        }
            
        return Db::getInstance()->queryAll($sql);
    }

    public function getTableName()
    {
        return 'menu';
    } 
}
