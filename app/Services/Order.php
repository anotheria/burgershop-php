<?php
/**
 * Created by PhpStorm.
 * User: submi
 * Date: 10/24/2017
 * Time: 11:58 PM
 */

namespace app\Services;


class Order
{

    private $items = [];
    private $totalPrice = 0;

    public function addItem(ShoppableItem $item){
        $this->items[] = $item;
        $this->totalPrice += $item->getPrice();
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Returns total order price in nice format
     * @return float
     */
    public function getNiceTotalPrice()
    {
        return round($this->totalPrice / 100, 2);
    }

}