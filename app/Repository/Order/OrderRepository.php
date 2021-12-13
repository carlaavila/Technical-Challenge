<?php


namespace App\Repository\Order;


use App\Models\Order;
use Illuminate\Contracts\Queue\EntityNotFoundException;

class OrderRepository
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * @param Order $order
     */

    public function findById(int $id): Order
    {
        $result = $this->model->newQuery()->find($id);

        if (! $result) {
            throw new EntityNotFoundException(Order::class, $id);
        }

        return $result;
    }
    public function findByExternalReference(string $externalReference)
    {
        return $this->model->newQuery()
            ->where('code', '=', $externalReference)
            ->firstOrFail();

    }
    public function save(Order $order): void
    {
        $order->save();
    }

}
