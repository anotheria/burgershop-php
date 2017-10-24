<?php

namespace app\Services;


class ShoppableItem
{

    /**
     * @var string $name
     */
    private $name;
    /**
     * @var int $price
     */
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

}