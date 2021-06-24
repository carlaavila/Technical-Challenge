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
    public function save(Payment $payment): void
    {
        $payment->save();
    }

}
