<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Money\Currency;
use Money\Money;


class Product extends Model
{
    use HasFactory, SoftDeletes;

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

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);

    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deleted_at;
    }

}
