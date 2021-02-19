<?php

namespace app\models\example;

abstract class Product
{
    protected string $name;
    protected float $price;
    protected float $quantity;
    protected float $totalCost;
    public static float $totalProceeds = 0;

    public function __construct(string $name, float $price, float $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->totalCost = $this->calcCost($quantity, $price);
        static::$totalProceeds += $this->totalCost;
    }

    public function __get(string $property)
    {
        foreach ($this as $prop => $val) {
            if ($property == $prop) {
                return $this->$property;
            }
        }

        echo "нет такого свойства";

        return false;
    }

    abstract protected function calcCost(float $quantity, float $price);
}
