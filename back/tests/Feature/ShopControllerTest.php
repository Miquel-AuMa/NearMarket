<?php

namespace Tests\Feature;

use App\Shop;
use App\ShopType;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_shops()
    {
        $user = factory(User::class)->create();

        $shops = factory(Shop::class, 5)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/shops');

        $this->assertCount(5, $response->json('data'));
        $this->assertEquals($shops->pluck('id'), collect($response->json('data'))->pluck('id'));
    }

    /** @test */
    public function it_creates_a_shop()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->post('/api/shops', [
                'shop_type_id' => factory(ShopType::class)->create()->id,
                'phone_number' => '555-555-555',
                'name' => 'A name shop',
                'password' => 'secret',
                'password_confirmation' => 'secret',
                'address_line_1' => '13 Rue del Percebe',
                'city' => 'Madrid',
                'zip' => '28080',
                'delivery' => 1,
                'schedule' => [
                    [
                        'open' => '11:00',
                        'close' => '14:00',
                    ],
                    [
                        'open' => '16:00',
                        'close' => '20:00'
                    ]
                ],
            ]);

        $response->assertStatus(201);

        $shop = Shop::all()->last();
        $this->assertEquals([
            [
                'open' => '11:00',
                'close' => '14:00',
            ],
            [
                'open' => '16:00',
                'close' => '20:00'
            ]
        ], $shop->schedule);
        $this->assertEquals(1, $shop->delivery);
        $this->assertDatabaseHas('shops', [
            'name' => 'A name shop'
        ]);
    }

    /** @test */
    public function it_shows_shop()
    {
        $user = factory(User::class)->create();

        $shop = factory(Shop::class)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/shops/' . $shop->id);

        $this->assertEquals($shop->name, $response->json('data.name'));
    }

    /** @test */
    public function it_updates_shop()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $shop = factory(Shop::class)->create();
        $shopPassword = $shop->password;

        $response = $this->actingAs($user, 'api')
            ->put('/api/shops/' . $shop->id, [
                'name' => 'A new name',
                'delivery' => 1,
                'schedule' => [
                    [
                        'open' => '10:00',
                        'close' => '14:00',
                    ],
                    [
                        'open' => '16:00',
                        'close' => '21:00'
                    ]
                ],
            ]);

        $this->assertEquals('A new name', $response->json('data.name'));
        $this->assertEquals('A new name', $shop->fresh()->name);
        $this->assertEquals(1, $shop->fresh()->delivery);
        $this->assertEquals([
            [
                'open' => '10:00',
                'close' => '14:00',
            ],
            [
                'open' => '16:00',
                'close' => '21:00'
            ]
        ], $shop->fresh()->schedule);
        $this->assertEquals($shopPassword, $shop->fresh()->password);
    }

    /** @test */
    public function it_deletes_shop()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $shop = factory(Shop::class)->create();

        $response = $this->actingAs($user, 'api')
            ->delete('/api/shops/' . $shop->id);

        $response->assertStatus(200);
    }
}
