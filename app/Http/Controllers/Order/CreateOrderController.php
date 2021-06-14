<?php


namespace App\Http\Controllers\Order;


use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repository\Order\OrderRepository;
use App\Service\Order\OrderService;
use App\Service\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateOrderController
{
    private $orderService;
    private $productService;
    private $orderRepository;

    public function __construct(OrderService $orderService, ProductService $productService, OrderRepository $orderRepository)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
        $this->orderRepository = $orderRepository;
    }

    public function store(Request $request)
    {

        $id = $request->route('id');

        $product = Product::where([
            ['id', '=', $id],
        ])->firstOrFail();


//        $validator = Validator::make($request->all(), [
//            'code' => 'required|string',
//            'amount' => 'string',
//            'quantity' => 'required|min:0',
//            'order_status' => 'required',
//            'product_id' => 'required',
//            'preference_id' => 'required',
//            'user_id' => 'required',
//        ]);
//        if ($validator->fails()) {
//            return redirect('dashboard')
//                ->withErrors($validator)
//                ->withInput();
//        }

        $product = $this->productService->findByIdOrFail($product->getId());



//        $order = $this->orderService->create();
//        $this->orderRepository->save($order);


        return redirect()->route('createProduct');
    }

}
