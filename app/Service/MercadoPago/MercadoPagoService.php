<?php

namespace App\Service\MercadoPago;

use App\Models\Product;
use Illuminate\Support\Str;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;
use MercadoPago\SDK;

require '../../../vendor/autoload.php';

SDK::setAccessToken('TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020');


class MercadoPagoService
{

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
            "success" => "http://localhost:8000/success",
            "failure" => "http://localhost:8000/failure",
            "pending" => "http://localhost:8000/pending"
        );
        $preference->auto_return = "approved";


        $preference->save();

        return $preference;
    }



}
