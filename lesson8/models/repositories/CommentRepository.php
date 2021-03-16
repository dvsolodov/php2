<?php

namespace app\models\repositories;

use app\core\{Db, Session, Request};
use app\models\Repository;
use app\models\entities\Comment;

class CommentRepository extends Repository
{
    public function getAllComments($product_id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `product_id` = {$product_id} ORDER BY `comment_date` DESC";
        return Db::getInstance()->queryAll($sql);
    }

    public function getTableName()
    {
        return 'comments';
    }

    public function getEntityClass()
    {
        return Comment::class;
    }
}

