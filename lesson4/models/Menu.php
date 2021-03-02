<?php

namespace app\models;

use app\core\Db;

class Menu extends Model
{
    public function getMenu($whoseMenu)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT `name`, `link` FROM {$tableName} WHERE `{$whoseMenu}` > 0";
        return Db::getInstance()->queryAll($sql);
    }

    public function getTableName()
    {
        return 'menu';
    } 
}
