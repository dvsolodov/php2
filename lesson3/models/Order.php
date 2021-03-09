<?php

namespace app\models;

use app\core\Db;

class Order extends Model
{
    protected int $id;
    protected string $buyer_name;
    protected string $phone;
    protected int $user_id;
    protected string $buyer_id;
    protected int $status;
    protected string $statusName;


    public function __construct(
        string $buyer_name,
        string $phone,        
        int $user_id,         
        string $buyer_id,     
        int $status
    ) {
        $this->buyer_name = $buyer_name;
        $this->phone = $phone;
        $this->user_id = $user_id;
        $this->buyer_id = $buyer_id;
        $this->status = $status;
    }
    
    public function getTableName()
    {
        return 'orders';
    }

//CRUD Active Record
    public function getOne($id)
    {
        $sql = "SELECT `{$this->getTableName()}`.*, `order_statuses`.name as statusName
            FROM `{$this->getTableName()}`, `order_statuses` 
            WHERE `orders`.id = :id
            AND `order_statuses`.id = `{$this->getTableName()}`.status";

        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }
//END CRUD
}
