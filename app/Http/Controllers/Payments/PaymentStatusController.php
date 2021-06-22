<?php


namespace App\Http\Controllers\Payments;


use App\Models\Order;
use Illuminate\Http\Request;

class PaymentStatusController
{
    public function success(Request $request)
    {
        $order = Order::where([
            ['code', '=', $request['external_reference']],
        ])->firstOrFail();

        $product = $order->getProduct();

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

        return view('failure')
            ->with('order', $order)
            ->with('product', $product);
    }

}
