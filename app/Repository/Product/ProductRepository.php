<?php

namespace App\Repository\Product;

use App\Models\Product;
use Illuminate\Contracts\Queue\EntityNotFoundException;


class ProductRepository
{

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @param Product $product
     */

    public function findAll(): array
    {
        return $this->model->newQuery()->get()->all();
    }

    public function findById(int $id): Product
    {
        $result = $this->model->newQuery()->find($id);

        if (! $result) {
            throw new EntityNotFoundException(Product::class, $id);
        }

        return $result;
    }

    public function save(Product $product): void
    {
        $product->save();
    }

}
