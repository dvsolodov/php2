<?php

namespace app\models;

use app\interfaces\IModels;
use app\core\Db;

abstract class Model implements IModels
{
    protected int $id;

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            return $this->$name = $value;
        }
        
        return false;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        
        return false;
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

//CRUD Active Record
    public function getOneObject($id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `id` = :id";

        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `id` = :id";

        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public function insert()
    {
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;

            $columns[] = $key;
            $values[] = ':' . $key;
            $params[$key] = $value;
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', $values);

        $sql = "INSERT INTO `{$this->getTableName()}` ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->getLastInsertId();

        return $this;
    }

    public function update()
    {
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;

            $sets[] = "`{$key}` = :{$key}";
            $params[$key] = $value;
        }

        $sets = implode(', ', $sets);

        $sql = "UPDATE `{$this->getTableName()}` SET {$sets} WHERE `id` = {$this->id}";

        Db::getInstance()->execute($sql, $params);

        return $this;
    }

    public function delete()
    {
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `id` = :id";

        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    //END CRUD

    abstract public function getTableName();
}
