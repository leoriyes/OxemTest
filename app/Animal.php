<?php

namespace oxem\app;

/**
 * Class Animal
 * @package oxem\app
 */
class Animal
{
    /**
     * @var number Уникальный регистрационный номер
     */
    private $id;

    public function __construct($animalId)
    {
        $this->id = $animalId;
    }

    /**
     * Производство животным продукции в зависимости от типа животного
     * @param string $type Тип животного
     */
    public static function production($type)
    {
        switch($type) {
            case 'cows':
                return mt_rand(8, 12);
            case 'hens':
                return mt_rand(0, 1);
            default:
                throw new \Exception('Неизвестный тип животного ' . $type);
        }
    }
}