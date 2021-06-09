<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Money\Currency;
use Money\Money;
use phpDocumentor\Reflection\Types\Integer;

class Product extends Model
{
    use HasFactory;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): Money
    {
        return new Money($this->price, new Currency('ARS'));
    }

    public function setPrice(Money $price): void
    {
        $this->price = $price->getAmount();
    }

    public function getQuantity(): Integer
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}
