<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Money\Currency;
use Money\Money;

class CreateProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::all();

        return view('/createProduct')->with(
            'products', $products
        );
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'string',
            'price' => 'required|min:0',
        ]);
        if ($validator->fails()) {
            return redirect('createProduct')
                ->withErrors($validator)
                ->withInput();
        }

        $this->productService->create(
            $request->input('name'),
            $request->input('description'),
            new Money($request->input('price') * 100, new Currency('ARS'))
        );

        return redirect()->route('createProduct');
    }


}
