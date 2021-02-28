<?php

namespace app\models;

use app\interfaces\IModels;
use app\engine\Db;

abstract class Model implements IModels
{
    protected $db;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
       return $this->$name;
    }

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();
}
