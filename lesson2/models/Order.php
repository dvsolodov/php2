<?php

namespace app\models;

use app\engine\Db;

class Order extends Model
{
    protected int $userId;
    protected string $buyerId;

    public function __construct(Db $db, string $userId, string $buyerId)
    {
        parent::__construct($db);
        $this->userId = $userId;
        $this->buyerId = $buyerId;
    }

    public function getByUserId(int $userId)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `user_id` = {$userId}";

        return $this->db->queryAll($sql);
    }

    public function getTableName(): string
    {
        return 'orders';
    }
}
