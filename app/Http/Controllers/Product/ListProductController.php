<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repository\Product\ProductRepository;

class ListProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
      
    }

    public function index()
    {
        $products = $this->productRepository->findAll();

        return view('/dashboard')->with(
            'products', $products
        );
    }
}
