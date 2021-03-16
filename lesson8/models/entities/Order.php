<?php

namespace app\models\entities;

use app\models\Model;

class Order extends Model
{
    protected $buyer_name;
    protected $phone;
    protected $user_id;
    protected $buyer_id;
    protected $status;

    protected $changedProps = [
        'buyer_name' => false,
        'phone' => false,
        'user_id' => false,
        'buyer_id' => false,
        'status' => false
    ];

    public function __construct(
        $buyer_name = null,
        $phone = null,        
        $user_id = null,         
        $buyer_id = null,     
        $status = null
    ) {
        $this->buyer_name = $buyer_name;
        $this->phone = $phone;
        $this->user_id = $user_id;
        $this->buyer_id = $buyer_id;
        $this->status = $status;
    }
}
