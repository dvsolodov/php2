<?php

namespace app\models;

use app\engine\Db;

class Cart extends Model
{
    protected string $buyerId;

    public function __construct(Db $db, string $buyerId)
    {
        parent::__construct($db);
        $this->buyerId = $buyerId;
    }

    public function getByBuyerId()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `buyer_id` = {$this->buyerId}";

        return $this->db->queryAll($sql);
    }

    public function getTableName(): string
    {
        return 'carts';
    }
}
