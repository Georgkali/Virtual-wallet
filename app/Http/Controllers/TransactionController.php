<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function store(Request $request, Wallet $wallet)
    {
        $request->validate([
            'type' => ['required', 'accepted_if:+,-'],
            'value' => ['required', 'numeric', 'gt:0']
        ]);
        $transaction = new Transaction([
            'value' => $request->get('value'),
            'type' => $request->get('type')
        ]);

        $wallet->transactions()->save($transaction);
        return back();

    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return back();
    }

    public function fraudulent(Transaction $transaction)
    {
        $transaction->fraudulent === null ? $transaction->update(['fraudulent' => Carbon::now()]) : $transaction->update(['fraudulent' => null]);

        return back();
    }
}
