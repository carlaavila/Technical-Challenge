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

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);

    }

}
