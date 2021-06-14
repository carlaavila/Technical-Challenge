<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ListProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $products = Product::all();

        return view('/dashboard')->with(
            'products', $products
        );
    }
}
