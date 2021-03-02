<?php

/* Задание №1
 */
class Product
{
    protected string $name;
    protected string $manufacturer;
    protected float $price;

    function __construct($name, $manufacturer, $price)
    {
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class Book extends Product
{
    protected string $author;
    protected int $numOfPages;

    function __construct($name, $manufacturer, $price, $author, $numOfPages)
    {
        parent::__construct($name, $manufacturer, $price);
        $this->author = $author;
        $this->numOfPages = $numOfPages;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getNumOfPages()
    {
        return $this->numOfPages;
    }
}

$book = new Book('Мастер и Маргарита', 'Агентство Алгоритм', 1208, 'Булгаков Михаил Афанасьевич', 496);

echo <<<HTML
<h1>{$book->getName()}</h1>
<h2>{$book->getAuthor()}</h2>
<p>Издательство: {$book->getManufacturer()}</p>
<p>Страниц: {$book->getNumOfPages()}</p>
<p>Цена: {$book->getPrice()} рублей</p>
HTML; 



/* 2 Добавьте метод andWhere в класс Db, который обеспечит реализацию цепочеки:
 * echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();
 * что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5
 */

class Db {
    protected $tableName;
    protected $where;
    protected $andWheres = [];

    public function table($tableName) {
        $this->tableName = "`{$tableName}`";
        return $this;
    }

    public function where($field, $value) {
        $this->where = " WHERE `{$field}` = '{$value}'";
        return $this;
    }

    public function andWhere($field, $value) {
        $this->andWheres[] = " AND `{$field}` = '{$value}'";
        return $this;
    }

    public function getAll() {

        $sql = "SELECT * FROM {$this->tableName} ";
        $sql .= $this->where;
         
        if (!empty($this->andWheres)) {
            foreach ($this->andWheres as $value) {
                $sql .= $value;
            }
        }
         
        $this->andWheres = [];

        return $sql . PHP_EOL;
    }

    public function getOne($id) {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id}" . PHP_EOL;
    }
}


$db = new Db();
echo $db->table('users')->where('login', 'admin')->andWhere('pass', 123)->andWhere('first_name', 'Den')->getAll();

/* Задание №3.
    Статическая переменная не исчезает после завершения работы функции. 
    При последующем вызове этой функции в скрипте статическая переменная будет иметь значение, 
    которое имела при предыдущем вызове функции. 
    Если создать экземпляры класса, у которого имеется метод со статической переменной, 
    то данный метод будет существовать в одном экземпляре (хотя в него будут вставлены $this разных объектов.
    По этой причине в задании №3 вывод будет 1234.*/

/* Задание №4
    При наследовании классов создаются разные методы (принадлежащие разным классам), 
    даже если они имели внутри статическую переменную.
    В данном коде вывод будет 1122 */

/* Задание №5
    В этом задании классы, от которых создаются экземпляры, пишутся без круглых скобок, 
    что допускается в php, но не допускается в PSR-12 https://www.php-fig.org/psr/psr-12/ 
    Здесь вывод будет таким же и по тем же причинам, как и в задании №4. */

/* Статья по заданиям 3, 4, 5 https://habr.com/ru/post/259627/ */
