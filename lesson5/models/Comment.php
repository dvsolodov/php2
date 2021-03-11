<?php

namespace app\models;

use app\core\Db;

class Comment extends Model
{
    protected int $id;
    protected $product_id;
    protected $user_name;
    protected $text;
    protected $comment_date;

    public function __construct($product_id = null, $user_name = null, $text = null, $comment_date = null)
    {
        $this->product_id = $product_id;
        $this->user_name = $user_name;
        $this->text = $text;
        $this->comment_date = $comment_date;
    }

    public function getAllComments($product_id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `product_id` = {$product_id} ORDER BY `comment_date` DESC";
        return Db::getInstance()->queryAll($sql);
    }

    public function getTableName()
    {
        return 'comments';
    }
}
