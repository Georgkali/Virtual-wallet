<?php

namespace App\Services;

use App\Models\Wallet;

class TotalService implements TotalServiceInterface
{
    public function total(Wallet $wallet, string $type)
    {
        $counter = 0;
        $transactions = $wallet->transactions()->get();
        $incomes = $transactions->where('type', $type);
        foreach ($incomes as $transaction) {
            $counter += floatval($transaction->value);
        }
        return $type . $counter;
    }

}
