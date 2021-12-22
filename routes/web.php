<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->get('home', function () {
    return view('index');
});
Route::resources(['wallets' => WalletController::class,
    'transactions' => TransactionController::class
]);
Route::post('transactions/{wallet}', [TransactionController::class, 'store'])->name('transactions.store_tr');
