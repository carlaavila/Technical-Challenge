<?php

namespace App\Http\Controllers\Product;

use App\Repository\Product\ProductRepository;

class DeleteProductController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function delete($id)
    {
        $product = $this->productRepository->findById($id);

        $this->productRepository->softDelete($product);

        return redirect()->route('createProductView');

    }

}
