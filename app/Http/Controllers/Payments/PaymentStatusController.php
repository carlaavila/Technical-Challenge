<?php


namespace App\Http\Controllers\Payments;


use App\Http\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentStatusController
{
    public function success(Request $request)
    {
        $order = Order::where([
            ['code', '=', $request['external_reference']],
        ])->firstOrFail();

        $product = $order->getProduct();

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/{$payment_id}" . "?access_token=TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020");

        $status = (json_decode($response)->status);

//        if ($status == 'approved'){
//            $payment->setPaymentStatus(PaymentStatus::APPROVED);
//            $payment->save();
//        }

        return view('success')
            ->with('order', $order)
            ->with('product', $product);
    }

    public function pending(Request $request)
    {
        $order = Order::where([
            ['code', '=', $request['external_reference']],
        ])->firstOrFail();

        $product = $order->getProduct();

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/{$payment_id}" . "?access_token=TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020");

        $status = (json_decode($response)->status);

//        if ($status == 'pending'){
//            $order->setOrderStatus(PaymentStatus::PENDING);
//            $order->save();
//        }

        return view('pending')
            ->with('order', $order)
            ->with('product', $product);
    }

    public function failure(Request $request)
    {
        $order = Order::where([
            ['code', '=', $request['external_reference']],
        ])->firstOrFail();

        $product = $order->getProduct();

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/{$payment_id}" . "?access_token=TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020");

        $status = (json_decode($response)->status);

//        if ($status == 'approved'){
//            $order->setOrderStatus(PaymentStatus::REJECT);
//            $order->save();
//        }

        return view('failure')
            ->with('order', $order)
            ->with('product', $product);
    }

}
