<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Services\TotalServiceInterface;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private TotalServiceInterface $totalService;
    public function __construct(TotalServiceInterface $totalService)
    {
        $this->totalService = $totalService;
    }

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
        $incomes = $this->totalService->total($wallet, '+');
        $outgo = $this->totalService->total($wallet, '-');
        return view('wallet', ['wallet' => $wallet, 'transactions' => $transactions, 'incomes' => $incomes, 'outgo' => $outgo]);
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
