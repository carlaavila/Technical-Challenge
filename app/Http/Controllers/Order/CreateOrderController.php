<?php


namespace App\Http\Controllers\Order;


use App\Http\Enums\PaymentStatus;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Service\MercadoPago\MercadoPagoService;
use App\Service\Order\OrderService;
use App\Service\Payment\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateOrderController
{

    /**
     * @var MercadoPagoService
     */
    private $mercadoPagoService;
    /**
     * @var OrderService
     */
    private $orderService;
    /**
     * @var PaymentService
     */
    private $paymentService;

    public function __construct( MercadoPagoService $mercadoPagoService, OrderService $orderService, PaymentService $paymentService)
    {
        $this->mercadoPagoService = $mercadoPagoService;
        $this->orderService = $orderService;
        $this->paymentService = $paymentService;
    }

    public function index(Request $request)
    {
        $id = $request->route('id');

        $order = Order::where([
            ['id', '=', $id],
        ])->firstOrFail();

        $product = $order->getProduct();


        return view('createOrder')
            ->with('order', $order)
            ->with('product', $product);
    }

    public function store(Request $request)
    {

        $id = $request->route('id');

        $product = Product::where([
            ['id', '=', $id],
        ])->firstOrFail();

        intval($quantity = $request->input('quantity'));

        $preference = $this->mercadoPagoService->createPreference($product, $quantity);

        $amount = $preference->items[0]->unit_price * $quantity;

        $payment = $this->paymentService->createPayment();

        $order = $this->orderService->createOrder($preference->external_reference,$amount,$quantity,$product->getId(),$preference->id,1, $payment->getId());


        return redirect()
            ->route('createOrder', ['id' => $order->getId()]);

    }

}
