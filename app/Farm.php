<?php

namespace oxem\app;

/**
 * Class Farm
 * @package oxem\app
 */
class Farm
{
    /**
     * @param number $cowsCount Количество коров живущих в хлеве
     * @param number $hensCount Количество кур живущих в хлеве
     */
    public function __construct($cowsCount, $hensCount)
    {
        $this->addAnimal('cows', $cowsCount);
        $this->addAnimal('hens', $hensCount);
    }

    /**
     * @var array Массив, хранящий объекты коров
     */
    private $cows = [];
    /**
     * @var array Массив, хранящий объекты куриц
     */
    private $hens = [];

    /**
     * @param string $type Тип добавляемого/ых животного/ых
     * @param number $count Количество
     */
    public function addAnimal(string $type, $count = null)
    {
        if($count === null) {
            $this->$type[] = new Animal(uniqid());
            return;
        }

        for($i = 0; $i < $count; $i++) {
            $this->$type[] = new Animal(uniqid());
        }
    }

    /**
     * @return array Метод возвращает количество произведённой продукции: milk - литров молока, eggs - штук яиц
     */
    public function collectProducts()
    {
        $cowsProducts = 0;
        $hensProducts = 0;

        foreach($this->cows as $key => $cow) {
            $cowsProducts += Animal::production('cows');
        }

        foreach($this->hens as $key => $hen) {
            $hensProducts += Animal::production('hens');
        }

        return [
            'milk' => $cowsProducts,
            'eggs' => $hensProducts
        ];
    }
}
