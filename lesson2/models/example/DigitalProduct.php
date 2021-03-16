<?php

namespace app\models\example;

class DigitalProduct extends Product
{
    protected function calcCost(float $quantity, float $price)
    {
        return ($quantity * $price) / 2;
    }
}
