<?php

namespace app\models\repositories;

use app\models\{User, Repository, Model};
use app\core\Db;

class OrderRepository extends Repository
{
    public function getTableName()
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Order::class;
    }

//CRUD Active Record
    public function getAllOrders($buyerId = null, $userId = null)
    {
        if (User::isAuth()) {
            $sql = "SELECT `orders`.`id`, `orders`.`phone`, `order_statuses`.name as status 
                FROM `orders`, `order_statuses` 
                WHERE `orders`.`user_id` = '{$userId}'
                AND `orders`.`status` = `order_statuses`.`id`";
        } else {
            $sql = "SELECT `orders`.`id`, `orders`.`phone`, `order_statuses`.name as status 
                FROM `orders`, `order_statuses` 
                WHERE `orders`.`buyer_id` = '{$buyerId}'
                AND `orders`.`status` = `order_statuses`.`id`";
        }


        return Db::getInstance()->queryAll($sql);
    }

    public function getCartOfOrder($id)
    {
        $sql = "SELECT `carts`.`id` as cartId, `products`.`id` as prodId, `products`.`name` as name, `products`.`img` as img, `carts`.`quantity` as quantity, `carts`.`price` as price
            FROM `orders` 
            JOIN `carts` ON `orders`.`buyer_id` = `carts`.`buyer_id`
            JOIN `products` ON `carts`.`product_id` = `products`.`id`
            WHERE `orders`.id = :id";

        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }
//END CRUD
}
