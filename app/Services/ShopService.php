<?php

namespace App\Services;

interface ShopService
{

    /**
     * @return array of arrays where keys is category names
     *         and values is shoppable items arrays
     */
    public function getShopableItems();

    /**
     * Composes burger order
     * @param string[] $items
     * @return Order
     */
    public function placeOrder($items);

}