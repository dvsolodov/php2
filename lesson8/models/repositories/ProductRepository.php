<?php

namespace app\models\repositories;

use app\core\{Db, Session, Request};
use app\models\Repository;
use app\models\entities\Product;

class ProductRepository extends Repository
{
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

    public function getEntityClass()
    {
        return Product::class;
    }
}

