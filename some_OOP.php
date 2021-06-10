<?php
// Задание 1
// Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п. или любой другой области.
// Опишите свойства и методы, придумайте наследника, расширяющего функционал родителя. Приведите пример использования. ВАЖНОЕ.
class Item {
    public $price;
    public $quantity;
    public $color;
    public $name;
    public function __construct($name = '', $price = 0, $quantity = 0, $color = '')
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->color = $color;
    }
    public function sayName() {
        echo " Имя: {$this->name} " . PHP_EOL;
    }
}
class Clothes extends Item {
    public $size;
    public $gender;
    public function __construct($size = 0, $gender = '', $price = 0, $quantity = 0, $color = '', $name = '')
    {
        parent::__construct($price, $quantity, $color, $name);
        $this->size = $size;
        $this->gender = $gender;
    }
}
class Car extends Item {
    public $weight;
    public $speed;
    public $contains;
    public function __construct($size = 0, $speed = 0, $contains = '', $price = 0, $quantity = 0, $color = '', $name = '')
    {
        parent::__construct($name, $price, $quantity, $color, );
        $this->weight = $size;
        $this->speed = $speed;
        $this->contains = $contains;
        $this->sayName();
    }
    public function how_long_does_it_take($distance_in_km) {
        $time = $this->speed / $distance_in_km;
        echo "Доедет за {$time} минут " . PHP_EOL;
    }
}

$item_1 = new Item('1200', '300', 'white');
$skirt =  new Clothes('46', 'M', '1500', '1', 'Blue', 'My skirt');
$audi = new Car('1500', 90, 'Power...',  50000000,'1' , 'Black', 'My Audi');
$jeans = new Clothes('43', 'F', '2000', '2', 'Green', 'My jeans');
$audi->how_long_does_it_take(15);
