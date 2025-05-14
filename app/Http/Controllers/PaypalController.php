<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{
    private $provider;
    public function __construct(){
         $this->provider = new PayPalClient;
         $this->provider->getAccessToken();
    }
    public function handlepayment(){
        $order['intent']='CAPTURE';

        $purchase_units=[];

        $unit=[
            'items'=>[
                [
                    'name'=>'red tshirt',
                    'quantity'=>1,
                    'unit_amount'=>[
                        'currency_code'=>'USD',
                        'value'=>50.00,
                    ]
                ],
                [
                    'name'=>'blue tshirt',
                    'quantity'=>1,
                    'unit_amount'=>[
                        'currency_code'=>'USD',
                        'value'=>50.00,
                    ]
                ],
            ],
            'amount'=>[
                'currency_code'=>'USD',
                'value'=>'100.00',
                'breakdown'=>[
                    'item_total'=>[
                        'currency_code'=>'USD',
                        'value'=>'100.00'
                    ]
                ]
            ]
                    ];

    $purchase_units[]= $unit;      
    
    $order['purchase_units'] = $purchase_units;

    $order['application_context']=[
        'return_url'=> url('payment-success'),
        'cancel_url'=>url('payment-failed')
    ];

    $response = $this->provider->createOrder($order);
      dd($response);

    }
    public function paymentsuccess(){

    }

    public function paymentfailed(){

    }
}
