<?php

namespace App\Http\Controllers;


use App\Http\Enums\PaymentStatus;
use App\Mail\SendEmail;
use App\Models\Payment;
use App\Repository\Payment\PaymentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;


class NotificationsController
{

    private $paymentRepository;

    public function __construct(
        PaymentRepository $paymentRepository
    )
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function __invoke(Request $request)
    {

        if($_GET['topic'] == 'payment')
        {
            $payment_info =  Http::get("https://api.mercadopago.com/v1/payments/".$_GET['id'] . "?access_token=TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020");

            $paymentId = $payment_info['id'];
            $payment = $this->paymentRepository->findByExternalId($paymentId);

            $order = $payment->getOrder();

            switch ($payment_info['status'])
            {
                case "approved" :
                {
                    $payment->setPaymentStatus(PaymentStatus::APPROVED);
                    $this->paymentRepository->save($payment);
                }
                break;
                case  "pending" :
                {
                    $payment->setPaymentStatus(PaymentStatus::PENDING);
                    $this->paymentRepository->save($payment);
                }
                break;
                case "rejected" :
                {
                    $payment->setPaymentStatus(PaymentStatus::REJECTED);
                    $this->paymentRepository->save($payment);
                }
                break;
            }

            Mail::to('carlita-avila96@hotmail.com')->send(New SendEmail($order, $payment));

        }

        return json_encode(['HTTP/1.1 200 OK'], 200);

    }

}


