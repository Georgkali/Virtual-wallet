<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{

    public function index()
    {
        return view('wallet_list', ['wallets' => Wallet::all()->where('user_id', auth()->id())]);
    }

    public function create()
    {
        return view('create_wallet');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);
        $wallet = new Wallet([
            'name' => $request->get('name'),

        ]);
        $wallet->user()->associate(auth()->user());
        $wallet->save();
        return $this->index();
    }

    public function show(Wallet $wallet)
    {
        $transactions = $wallet->transactions()->get();

        return view('wallet', ['wallet' => $wallet, 'transactions' => $transactions]);
    }

    public function edit(Wallet $wallet)
    {
        return view('edit_wallet', ['wallet' => $wallet]);
    }

    public function update(Request $request, Wallet $wallet)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $wallet->update([
            'name' => $request->get('name'),
        ]);
        return $this->index();
    }

    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
        return $this->index();
    }
}
