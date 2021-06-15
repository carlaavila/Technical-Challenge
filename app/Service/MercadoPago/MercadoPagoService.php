<?php

namespace App\Service\MercadoPago;

use App\Models\Product;
use App\Service\Order\OrderService;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

require '../../../vendor/autoload.php';

SDK::setAccessToken('TEST-2018341020639303-060912-516ffa99130e677407f1a1b118420b1e-212266020');


class MercadoPagoService
{
    private $orderService;


    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createPreference(Product $product, int $quantity)
    {
        $preference = new Preference();

        $item = new Item();


        $item->title = $product->getName();
        $item->description = $product->getDescription();
        $item->quantity = $quantity;
        $item->unit_price = floatval($product->getPrice()->getAmount()/100);

        $preference->items = array($item);

//        $preference->back_urls = array(
//            "success" => "http://localhost:8080/feedback",
//            "failure" => "http://localhost:8080/feedback",
//            "pending" => "http://localhost:8080/feedback"
//        );
//        $preference->auto_return = "approved";

        $preference->save();

        $amount = $item->unit_price * $quantity;

        $response = array(
            'id' => $preference->id,
        );

        $order = $this->orderService->createOrder($amount,$quantity,$product->getId(),$preference->id,1);

        return view('/dashboard')->with([
                'preference', $preference,
                'order',$order
        ]);


    }



}
