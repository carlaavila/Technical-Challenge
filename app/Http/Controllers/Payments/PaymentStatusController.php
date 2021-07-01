<?php


namespace App\Http\Controllers\Payments;


use App\Http\Enums\PaymentStatus;
use App\Mail\SendEmail;
use App\Models\Order;use App\Service\Payment\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PaymentStatusController
{
    /**
     * @var PaymentService
     */
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function findOrder(Request $request){
        return Order::where([
            ['code', '=', $request['external_reference']],
        ])->firstOrFail();
    }

    public function success(Request $request)
    {
        $order = $this->findOrder($request);
        $product = $order->getProduct();

        $externalId = $request->get('payment_id');
        $payment = $this->paymentService->createPayment($order->getCode(),$externalId);



        return view('success')
            ->with('order', $order)
            ->with('product', $product);
    }

    public function pending(Request $request)
    {
        $order = $this->findOrder($request);
        $product = $order->getProduct();

        $externalId = $request->get('payment_id');
        $this->paymentService->createPayment($order->getCode(),$externalId);

        return view('pending')
            ->with('order', $order)
            ->with('product', $product);
    }

    public function failure(Request $request)
    {
        $order = $this->findOrder($request);
        $product = $order->getProduct();

        $externalId = $request->get('payment_id');
        $this->paymentService->createPayment($order->getCode(),$externalId);

        return view('failure')
            ->with('order', $order)
            ->with('product', $product);
    }

}
