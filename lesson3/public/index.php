<?php

include dirname(__DIR__) . '/config/config.php';
include dirname(__DIR__) . '/core/Autoload.php';

use app\core\{
    Autoload,
    Db
};
use app\models\{
    User,
    Product,
    Category,
    Cart,
    Order
};

spl_autoload_register([new Autoload, 'loadClass']);

$user = new User(
    'Den',
    password_hash(123, PASSWORD_DEFAULT),
    time()
);
$order = new Order('Den', '234234', 1, '2342rfdsf2354', 1);
echo 'Добавляем запись в БД<br>'; 
$user->insert();
var_dump($user);

echo '<br>Изменяем у объекта свойство<br>';
$user->login = 'User';
var_dump($user);

echo '<br>Обновляем новыми данными запись в БД<br>';
$user->update();
var_dump($user);

echo '<br>Получаем данные из БД в виде ассоциативного массива <br>';
$id = $user->id;
$userArr = $user->getOne($id);
var_dump($userArr);
/*
echo '<br>Получаем данные из БД в виде объекта <br>';
$userObj = $user->getOneObject($id);
var_dump($userObj);
 */
//echo '<br>Удаляем запись из БД <br>';
//$user->delete();
//var_dump($user);
