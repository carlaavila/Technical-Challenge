<?php


namespace App\Repository\Order;


use App\Models\Order;

class OrderRepository
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * @param Order $order
     */
    public function save(Order $order): void
    {
        $order->save();
    }

}
