<?php


namespace App\Service\Payment;


use App\Http\Enums\PaymentStatus;
use App\Models\Payment;
use App\Repository\Payment\PaymentRepository;

class PaymentService
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function createPayment(int $order_id, int $user_id): Payment
    {
        $payment = new Payment();

        $payment->setPaymentStatus(PaymentStatus::CREATED);
        $payment->setOrderId($order_id);
        $payment->setUserId($user_id);

        $this->paymentRepository->save($payment);

        return($payment);

    }

}
