<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request, Wallet $wallet)
    {
        $request->validate([
            'type' => 'required',
            'value' => 'required'
        ]);
        $transaction = new Transaction([
            'value' => $request->get('value'),
            'type' => $request->get('type')
        ]);

        $wallet->transactions()->save($transaction);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
