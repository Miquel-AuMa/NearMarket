<?php

namespace Tests\Feature;

use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_list_order_items()
    {
        $user = factory(User::class)->create();
        $orderItems = factory(OrderItem::class, 5)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/order-items');

        $this->assertCount(5, $response->json('data'));
        $this->assertEquals($orderItems->pluck('id'), collect($response->json('data'))->pluck('id'));
    }

    /** @test */
    public function it_creates_a_order_item()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->post('/api/order-items', [
                'order_id' => factory(Order::class)->create()->id,
                'product_id' => factory(Product::class)->create()->id,
                'number' => 5,
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('order_items', [
            'number' => 5
        ]);
    }

    /** @test */
    public function it_shows_order_item()
    {
        $user = factory(User::class)->create();

        $orderItem = factory(OrderItem::class)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/order-items/' . $orderItem->id);

        $this->assertEquals($orderItem->number, $response->json('data.number'));
    }

    /** @test */
    public function it_update_order_item()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $orderItem = factory(OrderItem::class)->create();

        $response = $this->actingAs($user, 'api')
            ->put('/api/order-items/' . $orderItem->id, [
                'number' => 5,
            ]);

        $this->assertEquals(5, $response->json('data.number'));
        $this->assertEquals(5, $orderItem->fresh()->number);
    }

    /** @test */
    public function it_delete_order_item()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $orderItem = factory(OrderItem::class)->create();

        $response = $this->actingAs($user, 'api')
            ->delete('/api/order-items/' . $orderItem->id);

        $response->assertStatus(200);
    }
}
