<?php


namespace App\Http\Enums;


class PaymentStatus
{
    const CREATED = 'created';
    const REJECTED = 'rejected';
    const PENDING = 'pending';
    const AUTHORIZED = 'authorized';
    const APPROVED = 'approved';
}
