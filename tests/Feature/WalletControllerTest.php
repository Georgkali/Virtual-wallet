<?php

namespace Feature;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Traits\CanConfigureMigrationCommands;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WalletControllerTest extends TestCase
{
    use CanConfigureMigrationCommands;

    public function test_we_can_visit_wallets_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('wallets.index'));
        $response->assertStatus(200);
        $response->assertViewIs('wallet_list');
        $response->assertViewHas(['wallets']);
    }

    public function test_we_can_visit_wallet_create_page()
    {

        $this->actingAs(User::factory()->create());
        $response = $this->get(route('wallets.create'));
        $response->assertStatus(200);
        $response->assertViewIs('create_wallet');

    }

    public function test_we_can_create_wallet()
    {

        $this->actingAs(User::factory()->create());

        $response = $this->post(route('wallets.store', ['name' => 'test']));
        $this->assertDatabaseHas('wallets', ['name' => 'test']);
        $response->assertViewIs('wallet_list');

    }

    public function test_we_can_show_wallet()
    {

        $this->actingAs(User::factory()->create());
        $wallet = Wallet::factory()->create();
        $response = $this->get(route('wallets.show', ['wallet' => $wallet]));
        $response->assertViewIs('wallet');
        $response->assertViewHas(['wallet']);
    }

    public function test_we_can_visit_edit_wallet_page()
    {
        $this->actingAs(User::factory()->create());
        $wallet = Wallet::factory()->create();
        $response = $this->get(route('wallets.edit', ['wallet' => $wallet]));
        $response->assertStatus(200);
        $response->assertViewHas('wallet');
        $response->assertViewIs('edit_wallet');
    }

    public function test_we_can_edit_wallet()
    {
        $this->actingAs(User::factory()->create());
        $wallet = Wallet::factory()->create();
        $response = $this->put(route('wallets.update', ['wallet' => $wallet, 'name' => 'test']));
        $response->assertStatus(200);
        $response->assertViewIs('wallet_list');
        $this->assertDatabaseHas('wallets', ['name' => 'test']);

    }

    public function test_we_can_delete_wallet()
    {
        $this->actingAs(User::factory()->create());
        $wallet = Wallet::factory()->create();
        $response = $this->delete(route('wallets.destroy', ['wallet' => $wallet]));
        $response->assertStatus(200);
        $response->assertViewIs('wallet_list');
        $this->assertDatabaseMissing('wallets', [
            'name' => $wallet->name
        ]);
    }
    public function test_wallet_factory() {
        $this->actingAs(User::factory()->create());
        $wallet = Wallet::factory()->create();
        $this->assertDatabaseHas('wallets', [
            'name' => $wallet->name
        ]);

    }
}
