<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use MercadoPago\SDK;


SDK::setAccessToken(config('services.mercadoPago.token'));


class NotificationsController
{

    public function __invoke(Request $request)
    {
        dd($request);
        $payment_id = $request->get('payment_id');
        $response = Http::get("https://api.mercadopago.com/v1/payments/{$payment_id}" . "?access_token=TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020");

        $id = (json_decode($response)->id);

        $datos = $request->all();
        if ( ! isset($datos["id"], $datos["topic"]) || ! ctype_digit($datos["id"])) {
            abort(404);
        }

        dd($datos);

        logger(json_encode($request->all()));

        return 'ok';

    }

}
