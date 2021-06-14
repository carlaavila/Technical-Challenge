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

    public function create(float $amount, int $quantity, int $product_id, int $preference_id, int $user_id)
    {
        $order = new Order();

        $code = Str::random(15);

        $order->setCode($code);
        $order->setAmount($amount);
        $order->setQuantity($quantity);
        $order->setOrderStatus(OrderStatus::PENDING);
        $order->setProductId($product_id);
        $order->setPreferenceId($preference_id);
        $order->setUserId($user_id);

        $this->orderRepository->save($order);
    }

}
