<?php

namespace app\models\repositories;

use app\models\{Repository, Model};
use app\models\entities\{Admin, Order, User};
use app\core\{Db, Session};

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

    public function getAllStatusesOfOrder()
    {
        $sql = "SELECT * FROM `order_statuses`";

        return Db::getInstance()->queryAll($sql);
    }

    function updateStatus(int $statusId, int $orderId)
    {
        $sql = "UPDATE `orders` SET `status` = :statusId WHERE `orders`.id = :orderId";

        return Db::getInstance()->execute($sql, ['orderId' => $orderId, 'statusId' => $statusId]);
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

    public function getAllOrdersForAdmin(Session $session)
    {
        if (Admin::isAdmin($session)) {
            $sql = "SELECT `orders`.`id`, `orders`.`phone`, `orders`.`buyer_name` as name, `orders`.`status` as statusId, `order_statuses`.name as status 
                FROM `orders`, `order_statuses` 
                WHERE `orders`.`status` = `order_statuses`.`id`";
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
