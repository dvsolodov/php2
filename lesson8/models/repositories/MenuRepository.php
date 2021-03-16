<?php

namespace app\models\repositories;

use app\core\{Db, Session, Request};
use app\models\Repository;
use app\models\entities\{User, Menu};

class MenuRepository extends Repository
{
    public function getMenu($whoseMenu = null)
    {
        $tableName = $this->getTableName();

        if ($whoseMenu !== null) {
            $sql = "SELECT `name`, `link` FROM {$tableName} WHERE `{$whoseMenu}` > 0 ORDER BY `{$whoseMenu}`";
        } elseif (User::isAuth()) {
            $sql = "SELECT `name`, `link` FROM {$tableName} WHERE `user_menu` > 0 ORDER BY `user_menu`";
        } else {
            $sql = "SELECT `name`, `link` FROM {$tableName} WHERE `guest_menu` > 0 ORDER BY `guest_menu`";
        }
            
        return Db::getInstance()->queryAll($sql);
    }

    public function getTableName()
    {
        return 'menu';
    } 

    public function getEntityClass()
    {
        return Menu::class;
    }
}

