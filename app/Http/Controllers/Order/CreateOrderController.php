<?php


namespace App\Http\Controllers\Order;


use App\Models\Order;
use App\Models\Product;
use App\Service\MercadoPago\MercadoPagoService;
use Illuminate\Http\Request;

class CreateOrderController
{

    /**
     * @var MercadoPagoService
     */
    private $mercadoPagoService;

    public function __construct(  MercadoPagoService $mercadoPagoService)
    {
        $this->mercadoPagoService = $mercadoPagoService;
    }

    public function index(Request $request)
    {
        $id = $request->route('id');

        $product = Product::where([
            ['id', '=', $id],
        ])->firstOrFail();

        $order = Order::where([
            ['product_id', '=', $id],
        ])->firstOrFail();

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

        $quantity = $request->input('quantity');

        $this->mercadoPagoService->createPreference($product, $quantity);

        return redirect()
            ->route('createOrder', ['id' => $id])
            ->with('success', 'Orden de compra creada exitosamente');

    }

}
