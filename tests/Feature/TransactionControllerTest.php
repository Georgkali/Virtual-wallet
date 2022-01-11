<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{

    public function test_transaction_factory()
    {
        $this->actingAs(User::factory()->create());
        $transaction = Transaction::factory()->create();
        $this->assertDatabaseHas('transactions', [
            'value' => $transaction->value,
            'type' => $transaction->type
        ]);
    }

}
