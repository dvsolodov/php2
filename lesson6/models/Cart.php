<?php

namespace app\models;

use app\core\Db;
use app\core\Session;

class Cart extends Model
{
    protected int $id;
    protected $product_id;
    protected $quantity;
    protected $price;
    protected $user_id;
    protected $buyer_id;

    public function __construct(
        $product_id = null,    
        $quantity = null,      
        $price = null,       
        $user_id = null,       
        $buyer_id = null   
    ) {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->user_id = $user_id;
        $this->buyer_id = $buyer_id;
    }

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
}
