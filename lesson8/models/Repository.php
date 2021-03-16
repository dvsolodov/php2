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

        return Db::getInstance()->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
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
    public function getOneBy(object $entity, string $colName, string $dataType = 'obj')
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `{$colName}` = :{$colName}";

        if ($dataType == 'arr') {
            return Db::getInstance()->queryOne($sql, [$colName => $entity->$colName]);
        } elseif ($dataType == 'obj') {
            return Db::getInstance()->queryOneObject($sql, [$colName => $entity->$colName], $this->getEntityClass());
        }
    }

    public function save(Model $entity)
    {
        if (in_array(true, $entity->changedProps, true)) {
                return $this->update($entity);
        }

        return $this->insert($entity);
    }

    public function insert(Model $entity)
    {
        foreach ($entity->changedProps as $key => $value) {
            $columns[] = $key;
            $values[] = ':' . $key;
            $params[$key] = $entity->$key;
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', $values);

        $sql = "INSERT INTO `{$this->getTableName()}` ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);
        return Db::getInstance()->getLastInsertId();
    }

    public function update(Model $entity)
    {
        foreach ($entity->changedProps as $prop => $val) {
            if ($val === true) {
                $sets[] = "`{$prop}` = :{$prop}";
                $params[$prop] = $entity->$prop;
            }
        }

        $sets = implode(', ', $sets);

        $sql = "UPDATE `{$this->getTableName()}` SET {$sets} WHERE `id` = {$entity->id}";

        return Db::getInstance()->execute($sql, $params);
    }

    public function delete(Model $entity)
    {
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `id` = :id";

        return Db::getInstance()->execute($sql, ['id' => $entity->id]);
    }

    //END CRUD

}
