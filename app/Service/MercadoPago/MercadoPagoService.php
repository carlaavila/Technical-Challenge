<?php

namespace App\Service\MercadoPago;

use App\Models\Product;
use Illuminate\Support\Str;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;
use MercadoPago\SDK;




class MercadoPagoService
{
    public function __construct()
    {
        SDK::setAccessToken(config('services.mercadoPago.token'));
    }

    public function createPreference(Product $product, $quantity): Preference
    {

        $preference = new Preference();

        $item = new Item();

        $item->title = $product->getName();
        $item->description = $product->getDescription();
        $item->quantity = $quantity;
        $item->unit_price = floatval($product->getPrice()->getAmount()/100);

        $preference->items = array($item);

        $code = Str::random(15);

        $preference->external_reference = $code;

        $payer = new Payer();
        $payer->name = "Carla";
        $payer->email = "carlita-avila96@hotmail.com";

        $preference->back_urls = array(
            "success" => "http://localhost:8000/afterCheckout",
            "failure" => "http://localhost:8000/afterCheckout",
            "pending" => "http://localhost:8000/afterCheckout"
        );
        $preference->auto_return = "approved";
        $preference->statement_descriptor = "MINEGOCIO";
        $preference->notification_url = "https://2435114c327c.ngrok.io/notification";

        $preference->save();


        return $preference;
    }



}
