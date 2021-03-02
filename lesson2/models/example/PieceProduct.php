<?php

namespace app\models\example;

class PieceProduct extends Product
{
    protected function calcCost(float $quantity, float $price)
    {
        return $quantity * $price;
    }
}
