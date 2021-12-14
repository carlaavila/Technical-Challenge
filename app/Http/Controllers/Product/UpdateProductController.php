<?php

namespace App\Http\Controllers\Product;

use App\Repository\Product\ProductRepository;
use App\Service\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Money\Currency;
use Money\Money;

class UpdateProductController
{

    private $productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function viewData(Request $request)
    {
        intval($id = $request->route('id'));

        $product = $this->productRepository->findById($id);


        return view('editProduct')->with(
            'product', $product
        )->with('id', $product->getId()
        );
    }

    public function edit(Request $request)
    {
            intval($id = $request->route('id'));

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

            $product = $this->productRepository->findById($id);

            $product->setName($request->input('name'));
            $product->setDescription($request->input('description'));
            $product->setPrice(new Money($request->input('price') * 100, new Currency('ARS')));
            $product->save();

            return redirect()->route('createProductView');

    }


}
