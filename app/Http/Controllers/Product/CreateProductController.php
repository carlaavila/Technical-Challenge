<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\Product\ProductRepository;
use App\Service\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Money\Currency;
use Money\Money;

class CreateProductController extends Controller
{
    private $productService;
    private $productRepository;

    public function __construct(ProductService $productService, ProductRepository $productRepository)
    {
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->findAll();

        return view('/createProduct')->with(
            'products', $products
        );
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'string',
            'price' => 'required|min:0',
        ]);
        if ($validator->fails()) {
            return redirect(route('createProductView'))
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
