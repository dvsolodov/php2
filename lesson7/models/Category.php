<?php

namespace app\models;

class Category extends Model
{
    protected int $id;
    protected $parent_id;
    protected string $name;

    public function __construct(string $name, $parent_id = null)
    {
        $this->parent_id = $parent_id;
        $this->name = $name;
    }

    public function getTableName()
    {
        return 'categories';
    }
}
