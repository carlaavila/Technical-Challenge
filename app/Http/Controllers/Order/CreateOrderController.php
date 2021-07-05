<?php


namespace App\Http\Controllers\Order;


use App\Models\Order;
use App\Models\Product;
use App\Service\MercadoPago\MercadoPagoService;
use App\Service\Order\OrderService;
use App\Service\Payment\PaymentService;
use Illuminate\Http\Request;

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


    public function __construct( MercadoPagoService $mercadoPagoService, OrderService $orderService, PaymentService $paymentService)
    {
        $this->mercadoPagoService = $mercadoPagoService;
        $this->orderService = $orderService;
        $this->paymentService = $paymentService;
    }

    public function index(Request $request)
    {
        try {
            $id = $request->route('id');

            $order = Order::where([
                ['id', '=', $id],
            ])->firstOrFail();

            $product = $order->getProduct();


            return view('createOrder')
                ->with('order', $order)
                ->with('product', $product);
        }
        catch (\Exception $exception) {
                return redirect()->route('dashboard')->with('errors', json_decode($exception->getMessage()));
            }
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

            $order = $this->orderService->createOrder($preference->external_reference,$amount,$quantity,$product->getId(),$preference->id,1);

            return redirect()
                ->route('createOrder', ['id' => $order->getId()]);

    }

}
