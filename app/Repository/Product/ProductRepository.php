<?php

namespace App\Repository\Product;

use App\Models\Product;



class ProductRepository
{

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @param Product $product
     */
    public function save(Product $product): void
    {
        $product->save();
    }

    public function listAllProducts() {
        return Product::query()->get();
    }
}
