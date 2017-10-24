<?php

namespace App\Http\Controllers;

use App\Services\ShopService;

class ShopController
{

    private $shopService;

    public function __construct(ShopService $shopService){
        $this->shopService = $shopService;
    }

    public function enterShop(){

        $items = $this->shopService->getShopableItems();

        foreach ($items as $category => $categoryItems)
            foreach ($categoryItems as $itemName => $item){
                $items[$category][$itemName]['nicePrice']
                    = round($item['price'] / 100, 2);
            }

        return view('shop', [
            'items' => $items
        ]);

    }

}