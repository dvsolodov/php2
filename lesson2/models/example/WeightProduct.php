<?php

namespace app\models\example;

class WeightProduct extends Product
{
    protected function calcCost(float $quantity, float $price)
    {
        if ($quantity > 1000) {
            return $quantity * $price * 0.9;
        } else {
            return $quantity * $price;
        }
    }
}
