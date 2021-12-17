<?php

namespace App\Models;

class CustomItem extends \MercadoPago\Item
{
    public function getId()
    {
        return $this->id;
    }

    public function getTittle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getUnitPrice() : int
    {
        return $this->unit_price;
    }

    public function setUnitPrice(int $unitPrice): void
    {
        $this->unit_price = $unitPrice;
    }



}
