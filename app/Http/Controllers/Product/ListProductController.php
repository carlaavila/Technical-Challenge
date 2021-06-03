<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $products = Product::all();

//        $products = Product::where([
//            ['should_hide', '=', false],
//        ])->orderBy('date', 'desc')
//            ->paginate(20);

        return view('/dashboard')->with(
            'products', $products
        );
    }
}
