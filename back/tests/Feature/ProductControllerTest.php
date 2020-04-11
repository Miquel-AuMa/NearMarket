<?php

namespace Tests\Feature;

use App\Product;
use App\Category;
use App\User;
use App\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_list_products()
    {
        $user = factory(User::class)->create();

        $product = factory(Product::class, 4)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/products');

        $this->assertCount(4, $response->json('data'));
        $this->assertEquals($product->pluck('id'), collect($response->json('data'))->pluck('id'));
    }
    
    /** @test */
    public function it_creates_a_product()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->post('/api/products', [
                'shop_id' => factory(Shop::class)->create()->id,
                'category_id' => factory(Category::class)->create()->id,
                'name' => 'A product name',
                'description' => 'my super descripción 😊',
                'unity_price' => 5,
                'available' => true,
                'photo' => null,
            ]);

        $response->assertStatus(201);

        $product = Product::all()->last();
        $this->assertEquals('A product name', $product->name);
        $this->assertDatabaseHas('products', [
            'name' => 'A product name'
        ]);
    }

    /** @test */
    public function it_shows_product()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $product = factory(Product::class)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/products/' . $product->id);

        $this->assertEquals($product->name, $response->json('data.name'));
    }

    /** @test */
    public function it_updates_product()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $product = factory(Product::class)->create();

        $response = $this->actingAs($user, 'api')
            ->put('/api/products/' . $product->id, [
                'name' => 'A new name',
                'description' => 'Product description',                
            ]);

        $this->assertEquals('A new name', $response->json('data.name'));
        $this->assertEquals('A new name', $product->fresh()->name);
        $this->assertEquals('Product description', $product->fresh()->description);
    }

    /** @test */
    public function it_deletes_product()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $product = factory(Product::class)->create();

        $response = $this->actingAs($user, 'api')
            ->delete('/api/products/' . $product->id);

        $response->assertStatus(200);
    }
}