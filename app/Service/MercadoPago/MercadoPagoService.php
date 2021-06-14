<?php

namespace App\Service\MercadoPago;

use App\Models\Product;
use http\Env\Request;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

require '../../../vendor/autoload.php';

SDK::setAccessToken('TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020');


class MercadoPagoService
{

    public function createPreference(Request $request){

        $preference = new Preference();

        $item = new Item();

        $id = $request->route('id');

        $product = Product::where([
            ['id', '=', $id],
        ])->firstOrFail();

        $item->title = $product->getName();
        $item->description = $product->getDescription();
        $item->quantity = $product->getQuantity();
        $item->unit_price = floatval($product->getPrice()->getAmount()/100);

        $preference->items = array($item);

//        $preference->back_urls = array(
//            "success" => "http://localhost:8080/feedback",
//            "failure" => "http://localhost:8080/feedback",
//            "pending" => "http://localhost:8080/feedback"
//        );
//        $preference->auto_return = "approved";

        $preference->save();

        return $preference;

    }



}
