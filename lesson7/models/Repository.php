<?php

namespace app\models;

use app\core\Db;

abstract class Repository
{
    abstract public function getTableName();
    abstract public function getEntityClass();

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

    /**
     * Метод возвращает запись из таблицы БД
     * или в виде массива (по умолчанию)
     * или в виде объекта
     *
     * @param string $colName Имя столбца в таблице. Должно соответствовать имени свойства
     * @param string $dataType 'arr' или 'obj'
     *
     * @return array | object
     */
    public function getOneBy(string $colName, string $dataType = 'obj')
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `{$colName}` = :{$colName}";

        if ($dataType == 'arr') {
            return Db::getInstance()->queryOne($sql, [$colName => $this->$colName]);
        } elseif ('obj') {
            return Db::getInstance()->queryOneObject($sql, [$colName => $this->$colName], static::class);
        }
    }

    public function save(Model $entity)
    {
        if (empty($entity->changedProps)) {
            return $this->insert($entity);
        } elseif (!empty($entity->changedProps)) {
            return $this->update($entity);
        }
    }

    public function insert(Model $entity)
    {
        foreach ($entity as $key => $value) {
            if ($key == 'id' || $key == 'changedProps') continue;

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

    public function update(Model $entity)
    {
        foreach ($entity->changedProps as $key => $prop) {
            if ($prop == 'id') continue;

            $sets[] = "`{$prop}` = :{$prop}";
            $params[$prop] = $this->$prop;
        }

        $sets = implode(', ', $sets);

        $sql = "UPDATE `{$this->getTableName()}` SET {$sets} WHERE `id` = {$entity->id}";

        Db::getInstance()->execute($sql, $params);

        $entity->changedProps = [];

        return $this;
    }

    public function delete(Model $entity)
    {
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `id` = :id";

        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    //END CRUD

}
