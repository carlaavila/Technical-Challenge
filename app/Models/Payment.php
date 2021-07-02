<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->belongsTo(Order::class, 'order_id','code');
    }

    public function getOrder() : ? Order
    {
        return $this->order;
    }

    public function setOrderId(string $orderId): void
    {
        $this->order_id = $orderId;
    }

    public function setExternalId(int $externalId) : void
    {
        $this->external_id = $externalId;
    }

    public function getExternalId(): int
    {
        return $this->external_id;
    }


}
