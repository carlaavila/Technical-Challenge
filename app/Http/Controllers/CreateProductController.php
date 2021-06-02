<?php

namespace App\Http\Controllers;

use App\Service\Product\ProductService;
use Illuminate\Http\Request;
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
        return view('dashboard');
    }

    public function create(Request $request)
    {
        $this->productService->create(
            $request->input('name'),
            $request->input('description'),
            new Money($request->input('price') * 100, new Currency('ARS'))
        );

    }


}
