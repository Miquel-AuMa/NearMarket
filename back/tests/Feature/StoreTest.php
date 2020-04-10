<?php

namespace Tests\Feature;

use App\Store;
use App\StoreType;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_list_stores()
    {
        $user = factory(User::class)->create();

        $stores = factory(Store::class, 5)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/stores');

        $this->assertCount(5, $response->json('data'));
        $this->assertEquals($stores->pluck('id'), collect($response->json('data'))->pluck('id'));
    }

    /** @test */
    public function it_creates_a_store()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->post('/api/stores', [
                'store_type_id' => factory(StoreType::class)->create()->id,
                'phone_number' => '555-555-555',
                'name' => 'A name store',
                'password' => 'secret',
                'password_confirmation' => 'secret',
                'address_line_1' => '13 Rue del Percebe',
                'city' => 'Madrid',
                'zip' => '28080',
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('stores', [
            'name' => 'A name store'
        ]);
    }

    /** @test */
    public function it_shows_store()
    {
        $user = factory(User::class)->create();

        $store = factory(Store::class)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/stores/' . $store->id);

        $this->assertEquals($store->name, $response->json('data.name'));
    }

    /** @test */
    public function it_update_store()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $store = factory(Store::class)->create();
        $storePassword = $store->password;

        $response = $this->actingAs($user, 'api')
            ->put('/api/stores/' . $store->id, [
                'name' => 'A new name',
            ]);

        $this->assertEquals('A new name', $response->json('data.name'));
        $this->assertEquals('A new name', $store->fresh()->name);
        $this->assertEquals($storePassword, $store->fresh()->password);
    }

    /** @test */
    public function it_delete_store()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $store = factory(Store::class)->create();

        $response = $this->actingAs($user, 'api')
            ->delete('/api/stores/' . $store->id);

        $response->assertStatus(200);
    }
}
