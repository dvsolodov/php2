<?php

namespace app\models\repositories;

use app\core\{Session, Request};
use app\models\Repository;
use app\models\entities\Category;

class CategoryRepository extends Repository
{
    public function getTableName()
    {
        return 'categories';
    }

    public function getEntityClass()
    {
        return Category::class;
    }
}

