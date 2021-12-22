<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use function Symfony\Bridge\Twig\Extension\twig_is_selected_choice;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wallet_list', ['wallets' => Wallet::all()->where('user_id', auth()->id())]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('create_wallet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);
        Wallet::create([
            'name' => $request->get('name'),
            'user_id' => auth()->id()
        ]);
        return $this->index();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet

     */
    public function show(Wallet $wallet)
    {
        return view('wallet', ['wallet' => $wallet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     */
    public function edit(Wallet $wallet)
    {
        return view('edit_wallet', ['wallet' => $wallet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
        return $this->index();
    }
}
