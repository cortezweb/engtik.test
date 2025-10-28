<?php

namespace App\Http\Controllers;

use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function createPaypalOrder(){

        $access_token = $this->generateAcessToken();
        $url = config('services.paypal.url') . '/v2/checkout/orders';

        Cart::instance('shopping');


        $response = Http::withHeaders([
             'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token,
            ])->post($url,[
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' =>  Cart::subtotal(),
                            'breakdown' => [
                                'item_total' => [
                                    'currency_code' => 'USD',
                                    'value' => Cart::subtotal(),
                                ],
                                'discount' => [
                                    'currency_code' => 'USD',
                                    'value' => '0.00',
                                ],
                            ],

                                     ],
                    'items' => Cart::content()->map(function($item){
                        return [
                            'name' => $item->name,
                            'unit_amount' => [
                                'currency_code' => 'USD',
                                'value' => $item->price,
                            ],
                            'quantity' => $item->qty,
                            'sku' => $item->id,
                        ];
                    })->values()->toArray()

                ]
            ]
            ])
            ->json();

        // Mostrar la respuesta en el navegador
        return response()->json($response);
    }

    public function generateAcessToken(){
        $client_id = config('services.paypal.client_id');
        $secret = config('services.paypal.secret');

        $auth = base64_encode($client_id . ':' . $secret);

        $url = config('services.paypal.url') . '/v1/oauth2/token';

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $auth,
        ])
        ->asForm()
        ->post($url, [
            'grant_type' => 'client_credentials',
        ])->json();

        return $response['access_token'];

    }
}
