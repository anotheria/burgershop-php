<?php

namespace App\Services;

use Anotheria\MoskitoPHPAgent\producers\impl\CounterProducer;
use Anotheria\MoskitoPHPAgent\producers\impl\ServiceOrientedProducer;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ShopServiceImpl implements ShopService
{

    /**
     * @var CounterProducer $ingredientsCounter
     */
    private $ingredientsCounter;
    private $orderServiceProducer;

    public function __construct()
    {
        $this->ingredientsCounter =
            new CounterProducer('ingredients', 'php', 'php');
        $this->orderServiceProducer =
            new ServiceOrientedProducer('orderService', 'php', 'php');
    }

    public function getShopableItems()
    {

        return [
            Categories::BREAD => [
                [
                    'name' => 'wheat',
                    'price' => 585
                ],
                [
                    'name' => 'wholemeal',
                    'price' => 28
                ],
                [
                    'name' => 'brioche',
                    'price' => 585
                ],
                [
                    'name' => 'burned',
                    'price' => 585
                ],
                [
                    'name' => 'leibniz',
                    'price' => 1085
                ],
            ],

            Categories::MEAT => [
                [
                    'name' => 'cow',
                    'price' => 1385
                ],
                [
                    'name' => 'pork',
                    'price' => 1385
                ],
                [
                    'name' => 'lamb',
                    'price' => 1385
                ],
                [
                    'name' => 'dog',
                    'price' => 1385
                ],
                [
                    'name' => 'rat',
                    'price' => 1385
                ],
            ],

            Categories::EXTRAS => [
                [
                    'name' => 'mushrooms',
                    'price' => 285
                ],
                [
                    'name' => 'broccoli',
                    'price' => 285
                ],
                [
                    'name' => 'cheese',
                    'price' => 285
                ],
                [
                    'name' => 'sauce',
                    'price' => 285
                ],
                [
                    'name' => 'cockroach',
                    'price' => 285
                ]
            ]
        ];

    }

    public function placeOrder($items)
    {

        $placeOrderWatcher = $this->orderServiceProducer->getWatcher('placeOrder');
        $placeOrderWatcher->start();

        $order = new Order();

        foreach ($items as $itemName) {

            $item = $this->findItemByName($itemName);

            if($item == null)
            {
                $placeOrderWatcher->end(true);
                throw new BadRequestHttpException('No such shoppable item: '  . $itemName);
            }

            $this->ingredientsCounter->incStats($itemName);
            $order->addItem($item);

        }

        $placeOrderWatcher->end();
        return $order;

    }

    private function findItemByName($name)
    {

        foreach ($this->getShopableItems() as $categoryItems)
            foreach ($categoryItems as $item)
                if($item['name'] == $name)
                    return new ShoppableItem($item['name'], $item['price']);

        return null;


    }

}