<?php

include "../engine/Autoload.php";
include "../config/config.php";

use app\engine\Autoload;
use app\engine\Db;
use app\models\example\{
    Product,
    PieceProduct,
    DigitalProduct,
    WeightProduct
};

spl_autoload_register([new Autoload(), 'loadClass']);

$pProd = new PieceProduct('Телевизор', 25000, 1);
$dProd = new DigitalProduct('KasperskyKey', 3000, 3);
$wProd = new WeightProduct('Картофель', 42.5, 103);
echo "Товар: {$pProd->name}. Цена за единицу: {$pProd->price} руб. Количество товара: {$pProd->quantity} ед. Итого за товар: {$pProd->totalCost} рублей.";
echo '<br>';
echo "Товар: {$dProd->name}. Цена за единицу: {$dProd->price} руб. Количество товара: {$dProd->quantity} ед. Итого за товар: {$dProd->totalCost} рублей.";
echo '<br>';
echo "Товар: {$wProd->name}. Цена за килограмм: {$wProd->price} руб. Количество товара: {$wProd->quantity} кг. Итого за товар: {$wProd->totalCost} рублей.";
echo '<br>';
$totalProceeds = Product::$totalProceeds;
echo "ИТОГО: {$totalProceeds} руб.";
