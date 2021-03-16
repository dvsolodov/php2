<?php

namespace app\models\entities;

use app\models\Model;

class Product extends Model
{
    protected int $id;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;
    protected $img;

    protected $changedProps = [
        'name' => false,
        'description' => false,
        'price' => false,
        'category_id' => false,
        'img' => false
    ];

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
}
