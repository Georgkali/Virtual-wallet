<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('home', function () {
        return view('index');
    })->name('home');

    Route::resources(['wallets' => WalletController::class,
        'transactions' => TransactionController::class
    ]);
    Route::post('transactions/{transaction}', [TransactionController::class, 'fraudulent'])->name('transactions.fraudulent');
    Route::post('{wallet}/transactions', [TransactionController::class, 'store'])->name('transactions.store_tr');
});
