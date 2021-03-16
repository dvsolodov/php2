<?php

namespace app\models\entities;

use app\models\Model;

class Cart extends Model
{
    protected int $id;
    protected $product_id;
    protected $quantity;
    protected $price;
    protected $user_id;
    protected $buyer_id;

    protected $changedProps = [
        'product_id' => false,
        'quantity' => false,
        'price' => false,
        'user_id' => false,
        'buyer_id' => false
    ];

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
}

