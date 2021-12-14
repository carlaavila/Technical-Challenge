<?php

namespace App\Service\MercadoPago;

use App\Models\Product;
use Illuminate\Support\Str;
use MercadoPago\Entity;
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
        $item = new Item();
        $item->setTitle($product->getName());
        $item->setDescription($product->getDescription());
        $item->setQuantity($quantity);
        $item->setUnitPrice(floatval($product->getPrice()->getAmount() / 100));

        $payer = new Payer();
        $payer->setName("Carla");
        $payer->setEmail("carlita-avila96@hotmail.com");

        $preference = new Preference();
        $preference->setItems(array($item));
        $code = Str::random(15);
        $preference->setExternalReference($code);
        $preference->setBackUrls(array(
            "success" => "http://localhost:8000/afterCheckout",
            "failure" => "http://localhost:8000/afterCheckout",
            "pending" => "http://localhost:8000/afterCheckout"
        ));
        $preference->setAutoReturn("approved");
        $preference->setStatementDescriptor("MIAPP");
        $preference->setNotificationUrl("https://2435114c327c.ngrok.io/notification");

        $preference->save();


        return $preference;
    }


}
