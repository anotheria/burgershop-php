<?php

namespace App\Http\Controllers;

use App\Services\ShopService;
use Illuminate\Http\Request;

class OrderController
{

    private $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    public function placeOrder(Request $request)
    {

        $order = $this->shopService->placeOrder(
            [
                $request->get('choice1'),
                $request->get('choice2'),
                $request->get('choice3')
            ]
        );

        return view('confirmation', [
            'totalPrice' => $order->getNiceTotalPrice(),
            'items' => $order->getItems()
        ]);

    }

}