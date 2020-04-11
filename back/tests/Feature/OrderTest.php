<?php

namespace Tests\Feature;

use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

     /** @test */
     public function it_list_orders()
     {
         $user = factory(User::class)->create();

         $orders = factory(Order::class, 5)->create();

         $response = $this->actingAs($user, 'api')
             ->get('/api/orders');

         $this->assertCount(5, $response->json('data'));
         $this->assertEquals($orders->pluck('id'), collect($response->json('data'))->pluck('id'));
     }

      /** @test */
      public function it_creates_a_order()
      {
          $this->withoutExceptionHandling();
          $user = factory(User::class)->create();

          $response = $this->actingAs($user, 'api')
              ->post('/api/orders', [
                  'user_id' => factory(User::class)->create()->id,
                  'delivery' => true,
                  'state' => 'accepted',
                  'request_date' => carbon::now(),
                  'pickup_date' => carbon::now(),
                  'annotations' => 'this is an annotation',
              ]);

          $response->assertStatus(201);
          $this->assertDatabaseHas('orders', [
              'state' => 'accepted'
          ]);
      }

      /** @test */
      public function it_shows_order()
      {
          $user = factory(User::class)->create();

          $order = factory(Order::class)->create();

          $response = $this->actingAs($user, 'api')
              ->get('/api/orders/' . $order->id);

          $this->assertEquals($order->state, $response->json('data.state'));
      }

      /** @test */
      public function it_update_order()
      {
          $this->withoutExceptionHandling();
          $user = factory(User::class)->create();

          $order = factory(Order::class)->create();

          $response = $this->actingAs($user, 'api')
              ->put('/api/orders/' . $order->id, [
                  'state' => 'accepted',
              ]);

          $this->assertEquals('accepted', $response->json('data.state'));
          $this->assertEquals('accepted', $order->fresh()->state);
      }

      /** @test */
      public function it_delete_order()
      {
          $this->withoutExceptionHandling();
          $user = factory(User::class)->create();

          $order = factory(Order::class)->create();

          $response = $this->actingAs($user, 'api')
              ->delete('/api/orders/' . $order->id);

          $response->assertStatus(200);
      }
}
