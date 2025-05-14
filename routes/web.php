<?php

use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('handle-payment',[PaypalController::class,'handlepayment'])->name('make.payment');

Route::get('payment-success',[PaypalController::class,'paymentsuccess'])->name('payment.success');

Route::get('payment-failed',[PaypalController::class,'paymentfailed'])->name('payment.failed');