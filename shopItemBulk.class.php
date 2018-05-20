<?php
//Задание 4.Класс для установки цен в зависимости от количества товара
class ShopItemsBulk
/*класс для оптовой продажи
(состояние*/
{
    public $product='new';
    public $price='low';
    public $package='bigSize','fragile';
    public $cartAdded='true';
    public $lastBoghtBy(id)='13';
}class ShopItems{
    public $product = 'new';
    public $price = 'low';
   /*класс для оптовой продажи
   (методы)*/
   public function price()
    {
        if ($amount > 150) {
            $price = 'high';
        } elseif ($amount > 70 && $amount < 90) {
            $price = 'normal';
        } else {
            $price = 'low';
        }
    }
    public $package = 'bigSize','fragile';
    public $cartAdded = true;
    public $user = 1;
    public function user()
    {
        if ($user !== 0) {
            $profile = 1;
        } else {
            $profile = 0;
        }
    }
}

?>