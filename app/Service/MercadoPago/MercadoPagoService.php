<?php

namespace App\Service\MercadoPago;

use App\Models\CustomItem;
use App\Models\CustomPayer;
use App\Models\CustomPreference;
use App\Models\Product;
use Illuminate\Support\Str;
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
        $item = new CustomItem();
        $item->setTitle($product->getName());
        $item->setDescription($product->getDescription());
        $item->setQuantity($quantity);
        $item->setUnitPrice(floatval($product->getPrice()->getAmount() / 100));

        $payer = new CustomPayer();
        $payer->setName("Carla");
        $payer->setEmail("carlita-avila96@hotmail.com");

        $preference = new CustomPreference();
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
