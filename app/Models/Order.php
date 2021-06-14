<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MercadoPago\Preference;

class Order extends Model
{
    use HasFactory;

    public function getId()
    {
        return $this->id;
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getAmount() : float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function setOrderStatus(string $status) : void
    {
        $this->order_status = $status;
    }

    public function getOrderStatus(): string
    {
        return $this->order_status;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct() : ?Product
    {
        return $this->product;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function preference(): BelongsTo
    {
        return $this->belongsTo(Preference::class);
    }

    public function getPreference() : ?Preference
    {
        return $this->preference;
    }

    public function setPreferenceId(int $preferenceId): void
    {
        $this->preference_id = $preferenceId;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser() : ?User
    {
        return $this->user;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }



}
