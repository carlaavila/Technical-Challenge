<?php

namespace App\Http\Controllers\Payments;

use App\Models\Order;
use App\Repository\Order\OrderRepository;
use App\Service\Payment\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PaymentStatusController
{

    private $paymentService;
    private $orderRepository;

    public function __construct(
        PaymentService $paymentService,
        OrderRepository $orderRepository
    )
    {
        $this->paymentService = $paymentService;
        $this->orderRepository = $orderRepository;
    }

    public function __invoke(Request $request)
    {
        $externalReference = $request['external_reference'];
        $order = $this->orderRepository->findByExternalReference($externalReference);
        $product = $order->getProduct();

        $externalId = $request->get('payment_id');
        $payment = $this->paymentService->createPayment($order->getCode(),$externalId);
        $response = Http::get("https://api.mercadopago.com/v1/payments/{$externalId}" . "?access_token=TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020");
        $status = (json_decode($response)->status);


        return view('afterCheckout')
            ->with('order', $order)
            ->with('payment', $payment)
            ->with('status', $status)
            ->with('product', $product);
    }


}
