<?php

namespace app\models\entities;

use app\models\Model;

class Order extends Model
{
    public $buyer_name;
    public $phone;
    public $user_id;
    public $buyer_id;
    public $status;


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
