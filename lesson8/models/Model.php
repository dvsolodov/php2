<?php

namespace app\models;

use app\core\Db;

abstract class Model
{
    protected int $id;
    protected $changedProps = [];
    
    public function __set($prop, $value)
    {
        if (property_exists($this, $prop)) {
            $this->changedProps[$prop] = true;
            $this->$prop = $value;
        }
        
        return false;
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
        
        return false;
    }

    public function __isset($prop)
    {
        return isset($this->$prop);
    }
}

