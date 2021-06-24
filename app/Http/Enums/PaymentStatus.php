<?php


namespace App\Http\Enums;


class PaymentStatus
{
    const CREATED = 'created';
    const REJECT = 'reject';
    const PENDING = 'pending';
    const AUTHORIZED = 'authorized';
    const APPROVED = 'approved';
}
