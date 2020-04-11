<?php

namespace Tests\Feature;

use App\Shop;
use App\ShopType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\PersonalAccessClient;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_register_a_user_with_a_shop()
    {
        factory(PersonalAccessClient::class)->create();
        $this->withoutExceptionHandling();
        $this->post('/api/users', [
            'user' => [
                'phone_number' => '555-555-555',
                'name' => 'John',
                'surname' => 'Doe',
                'password' => 'secret',
                'password_confirmation' => 'secret',
                'shop_id' => factory(Shop::class)->create()->id,
                'address_line_1' => 'Rue 13 from Percebe',
                'city' => 'Madrid',
                'zip' => '28080',
                'is_shop' => 1,
            ],
            'shop' => [
                'shop_type_id' => factory(ShopType::class)->create()->id,
                'phone_number' => '555-555-555',
                'name' => 'A name shop',
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
            ]
        ])->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'phone_number' => '555-555-555',
            'name' => 'John',
            'surname' => 'Doe',
            'type' => 'shop',
            'address_line_1' => 'Rue 13 from Percebe',
            'city' => 'Madrid',
            'zip' => '28080',
        ]);

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
    public function it_can_register_a_user()
    {
        factory(PersonalAccessClient::class)->create();
        $this->withoutExceptionHandling();
        $this->post('/api/users', [
            'user' => [
                'phone_number' => '555-555-555',
                'name' => 'John',
                'surname' => 'Doe',
                'password' => 'secret',
                'password_confirmation' => 'secret',
                'shop_id' => factory(Shop::class)->create()->id,
                'address_line_1' => 'Rue 13 from Percebe',
                'city' => 'Madrid',
                'zip' => '28080',
                'is_shop' => 0,
            ],
            'shop' => []
        ])->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'phone_number' => '555-555-555',
            'name' => 'John',
            'surname' => 'Doe',
            'type' => 'user',
            'address_line_1' => 'Rue 13 from Percebe',
            'city' => 'Madrid',
            'zip' => '28080',
        ]);
    }
}
