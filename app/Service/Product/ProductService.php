<?php

namespace App\Service\Product;

use App\Models\Product;
use App\Repository\Product\ProductRepository;
use Money\Money;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(string $name, string $description, Money $price, int $quantity)
    {
        $product = new Product();

        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        $product->setQuantity($quantity);

        $this->productRepository->save($product);
    }


}
