<?php


namespace App\Http\Controllers\Order;


use App\Models\Order;
use App\Models\Product;
use App\Service\MercadoPago\MercadoPagoService;
use App\Service\Product\ProductService;
use Illuminate\Http\Request;

class CreateOrderController
{
    private $MercadoPagoService;

    public function __construct( ProductService $productService, MercadoPagoService $mercadoPagoService)
    {
        $this->productService = $productService;
        $this->mercadoPagoService = $mercadoPagoService;
    }

    public function index(Request $request)
    {
        $id = $request->route('id');

        $product = Product::where([
            ['id', '=', $id],
        ])->firstOrFail();

        $order = Order::all();

        return view('createOrder')
            ->with('product',$product)
            ->with('order', $order)  ;


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
