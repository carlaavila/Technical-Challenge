<?php

namespace App\Service\Product;

use App\Models\Product;
use App\Repository\Product\ProductRepository;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Money\Money;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(string $name, string $description, Money $price)
    {
        $product = new Product();

        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);

        $this->productRepository->save($product);
    }

    public function findByIdOrFail(int $productId): Product
    {

        $product = $this->productRepository->findProductById($productId);
        if (!isset($product) && empty($product)) {
            throw new EntityNotFoundException(stringValue(),"Ocurrió un error o el producto seleccionado no existe.");
        }
        return $product;
    }


}
