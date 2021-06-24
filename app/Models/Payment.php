<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    public function getId()
    {
        return $this->id;
    }

    public function setPaymentStatus(string $status) : void
    {
        $this->payment_status = $status;
    }

    public function getPaymentStatus(): string
    {
        return $this->payment_status;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder() : ?Order
    {
        return $this->order;
    }

    public function setOrderId(int $orderId): void
    {
        $this->order_id = $orderId;
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
