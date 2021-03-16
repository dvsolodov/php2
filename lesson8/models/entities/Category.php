<?php

namespace app\models\entities;

use app\models\Model;

class Category extends Model
{
    protected int $id;
    protected $parent_id;
    protected string $name;

    protected $changedProps = [
        'parent_id' => false,
        'name' => false
    ];

    public function __construct(int $id = null, string $name = null, $parent_id = null)
    {
        parent::__construct();
        $this->parent_id = $parent_id;
        $this->name = $name;
    }
}

