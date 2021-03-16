<?php

namespace app\models\entities;

use app\models\Model;

class Comment extends Model
{
    protected int $id;
    protected $product_id;
    protected $user_name;
    protected $text;
    protected $comment_date;

    protected $changedProps = [
        'product_id' => false,
        'user_name' => false,
        'text' => false,
        'comment_date' => false
    ];

    public function __construct($product_id = null, $user_name = null, $text = null, $comment_date = null)
    {
        $this->product_id = $product_id;
        $this->user_name = $user_name;
        $this->text = $text;
        $this->comment_date = $comment_date;
    }
}

