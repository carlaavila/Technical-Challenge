<?php


namespace App\Service\Order;


use App\Http\Enums\OrderStatus;
use App\Models\Order;
use App\Repository\Order\OrderRepository;
use Illuminate\Support\Str;

class OrderService
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder(string $code,float $amount,int $quantity, int $product_id, string $preference_id, int $user_id): Order
    {
        $order = new Order();

        $order->setCode($code);
        $order->setAmount($amount);
        $order->setQuantity($quantity);
        $order->setOrderStatus(OrderStatus::PENDING);
        $order->setProductId($product_id);
        $order->setPreferenceId($preference_id);
        $order->setUserId($user_id);

        $this->orderRepository->save($order);

        return($order);

    }

}
