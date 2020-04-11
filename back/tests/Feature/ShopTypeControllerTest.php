<?php

namespace Tests\Feature;

use App\ShopType;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_shop_types()
    {
        $user = factory(User::class)->create();

        $shopTypes = factory(ShopType::class, 5)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/shop-types');

        $this->assertCount(5, $response->json('data'));
        $this->assertEquals($shopTypes->pluck('id'), collect($response->json('data'))->pluck('id'));
    }

    /** @test */
    public function it_creates_a_shop_type()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->post('/api/shop-types', [
                'name' => 'A shop type',
                'description' => 'A large shop type description',
            ]);

        $response->assertStatus(201);

        $shopType = ShopType::all()->last();
        $this->assertEquals('A shop type', $shopType->name);
        $this->assertEquals('A large shop type description', $shopType->description);
        $this->assertDatabaseHas('shop_types', [
            'name' => 'A shop type',
            'description' => 'A large shop type description',
        ]);
    }

    /** @test */
    public function it_shows_a_shop_type()
    {
        $user = factory(User::class)->create();

        $shopType = factory(ShopType::class)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/shop-types/' . $shopType->id);

        $this->assertEquals($shopType->name, $response->json('data.name'));
    }

    /** @test */
    public function it_updates_a_shop_type()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $shopType = factory(ShopType::class)->create();

        $response = $this->actingAs($user, 'api')
            ->put('/api/shop-types/' . $shopType->id, [
                'name' => 'A new name',
                'description' => 'A new large description'
            ]);

        $this->assertEquals('A new name', $response->json('data.name'));
        $this->assertEquals('A new name', $shopType->fresh()->name);
        $this->assertEquals('A new large description', $shopType->fresh()->description);
    }

    /** @test */
    public function it_deletes_a_shop_type()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $shopType = factory(ShopType::class)->create();

        $response = $this->actingAs($user, 'api')
            ->delete('/api/shop-types/' . $shopType->id);

        $response->assertStatus(200);
    }
}
