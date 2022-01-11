<?php

namespace App\Services;

use App\Models\Wallet;

interface TotalServiceInterface
{
    public function total(Wallet $wallet, string $type);
}
