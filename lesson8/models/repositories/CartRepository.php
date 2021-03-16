<?php

namespace app\models\repositories;

use app\core\{Db, Session, Request};
use app\models\Repository;
use app\models\entities\Cart;

class CartRepository extends Repository
{
    protected function getDataForQuery(string $buyerId, int $userId = null)
    {
        $data['field']['buyer_id'] = $buyerId;

        if (isset($userId)) {
            $extra = " AND `user_id` = :user_id";
            $data['field']['user_id'] = $userId; 
        } else {
            $extra = "";
        }
        $data['sql'] = "SELECT `carts`.id as cartId, `carts`.product_id as prodId, `products`.name as name, `products`.img as img, `carts`.quantity as quantity, `carts`.price as price, (`carts`.quantity * `carts`.price) as totalPrice 
            FROM `{$this->getTableName()}` 
            JOIN `products` ON `products`.id = `carts`.product_id
            WHERE `buyer_id` = :buyer_id" . $extra;

        return $data;
    }

    public function getCount(Session $session)
    {
        $sql = "SELECT COUNT(*) as `count` FROM `carts` WHERE `buyer_id` = :buyerId";

        return Db::getInstance()->queryAll($sql, ['buyerId' => $session->buyerId]);
    }



//CRUD Active Record
    public function getOneCart(string $buyerId, int $userId = null)
    {
        $data = $this->getDataForQuery($buyerId, $userId);
        
        return Db::getInstance()->queryAll($data['sql'], $data['field']);
    }

    public function getOneCartOfOrder($orderId)
    {
        $sql = "SELECT `carts`.`quantity` as quantity, `carts`.`price` as price, `products`.`name` as name, `products`.`img` as img, `carts`.`id` as goodsId
            FROM `orders`
            JOIN `carts` ON `carts`.`buyer_id` = `orders`.`buyer_id`
            JOIN `products` ON `products`.`id` = `carts`.`product_id`
            WHERE `orders`.`id` = :orderId";

        return Db::getInstance()->queryAll($sql, ['orderId' => $orderId]);
    }

    public function deleteAllGoods($buyerId)
    {
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `buyer_id` = :buyerId";

        return Db::getInstance()->execute($sql, ['buyerId' => $buyerId]);
    }

    //END CRUD
    public function getTableName()
    {
        return 'carts';
    }

    public function getEntityClass()
    {
        return Cart::class;
    }
}
