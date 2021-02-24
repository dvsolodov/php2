<?php

namespace app\models;

class Product extends Model
{
    protected int $id;
    protected string $name;
    protected string $description;
    protected float $price;
    protected int $category_id;
    protected string $img;

    public function __construct(
        string $name, 
        string $description, 
        float $price, 
        int $category_id,
        string $img
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->img = $img;
    }

    public function getTableName()
    {
        return 'products';
    }
}
