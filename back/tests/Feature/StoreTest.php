<?php

namespace Tests\Feature;

use App\Store;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_store()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('/api/stores', [
                'name' => 'a store'
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('stores', [
            'name' => 'a store'
        ]);
    }
}
