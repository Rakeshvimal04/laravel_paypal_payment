<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

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


    try {
        $approve_paypal_url = $response['links'][1]['href'];
        return Redirect::to($approve_paypal_url);
    } catch (\Throwable $th) {
        dd($th->getMessage(),$response);
    }

    }
    public function paymentsuccess(Request $request){
         $response= $this->provider->capturePaymentOrder($request->get('token'));
         dd($response);
    }

    public function paymentfailed(){
       dd('Your Payment has beend cancelled.Cancellation page goes here');
    }
}
