<?php

namespace app\models;

class Cart extends Model
{
    protected int $id;
    protected int $product_id;
    protected int $quantity;
    protected float $price;
    protected int $user_id;
    protected string $buyer_id;

    public function __construct(
        int $product_id = null,    
        int $quantity = null,      
        float $price = null,       
        int $user_id = null,       
        string $buyer_id = null   
    ) {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->user_id = $user_id;
        $this->buyer_id = $buyer_id;
    }

    protected function getDataForQuery(string $buyerId, int $userId = null)
    {
        $data['fiel']['buyer_id'] = $buyerId;

        if (isset($userId)) {
            $extra = " AND `user_id` = :user_id";
            $data['field']['user_id'] = $userId; 
        } else {
            $extra = "";
        }
        $data['sql'] = "SELECT * FROM `{$this->getTableName()}` WHERE `buyer_id` = :buyer_id" . $extra;

        return $data;
    }

//CRUD Active Record

    public function getOne(string $buyerId, int $userId = null)
    {
        $data = getDataForQuery($buyerId, $userId);
        
        return Db::getInstance()->queryOne($data['sql'], $data['field']);
    }

    //END CRUD
    public function getTableName()
    {
        return 'carts';
    }
}
