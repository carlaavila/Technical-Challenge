<?php


namespace App\Repository\Payment;


use App\Models\Payment;

class PaymentRepository
{
    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    /**
     * @param Payment $payment
     */

    public function findByExternalId(int $externalId)
    {
        return $this->model->newQuery()
            ->where('external_id', '=', $externalId)
            ->firstOrFail();

    }
    public function save(Payment $payment): void
    {
        $payment->save();
    }

}
