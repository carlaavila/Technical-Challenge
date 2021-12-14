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

    public function createPayment(string $orderId, int $externalId): Payment
    {
        $payment = new Payment();
        $payment->setOrderId($orderId);
        $payment->setPaymentStatus(PaymentStatus::CREATED);
        $payment->setExternalId($externalId);
        $this->paymentRepository->save($payment);

        return $payment;
    }
}
