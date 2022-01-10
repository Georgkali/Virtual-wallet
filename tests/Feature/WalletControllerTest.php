<?php

namespace Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Traits\CanConfigureMigrationCommands;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WalletControllerTest extends TestCase
{
    use CanConfigureMigrationCommands;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_we_can_visit_wallet_page()
    {
        $response = $this->get('/wallets');

        $response->assertStatus(200);
    }
}
