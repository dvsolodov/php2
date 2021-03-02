<?php

namespace app\models;

use app\core\Db;

class Product extends Model
{
    protected int $id;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;
    protected $img;

    public function __construct(
        $name = null, 
        $description = null, 
        $price = null, 
        $category_id = null,
        $img = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->img = $img;
    }

    public function getProducts($start = null)
    {
        $start = $start ?? 0;
        $quantity = PROD_PER_PAGE;
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT {$start},{$quantity}";
        return Db::getInstance()->queryAll($sql);
    }

    public function getTableName()
    {
        return 'products';
    }
}
