<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_list_categories()
    {
        $user = factory(User::class)->create();

        $categories = factory(Category::class, 3)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/categories');

        $this->assertCount(3, $response->json('data'));
        $this->assertEquals($categories->pluck('id'), collect($response->json('data'))->pluck('id'));
    }
    
    /** @test */
    public function it_creates_a_category()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')
            ->post('/api/categories', [
                'name' => 'A category name',
                'description' => 'my super descripción 😊'
            ]);

        $response->assertStatus(201);

        $category = Category::all()->last();
        $this->assertEquals('A category name', $category->name);
        $this->assertEquals('my super descripción 😊', $category->description);
        $this->assertDatabaseHas('categories', [
            'name' => 'A category name'
        ]);
    }

    /** @test */
    public function it_shows_category()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $category = factory(Category::class)->create();

        $response = $this->actingAs($user, 'api')
            ->get('/api/categories/' . $category->id);

        $this->assertEquals($category->name, $response->json('data.name'));
    }

    /** @test */
    public function it_updates_category()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $category = factory(Category::class)->create();

        $response = $this->actingAs($user, 'api')
            ->put('/api/categories/' . $category->id, [
                'name' => 'A new name',
                'description' => 'Category description',                
            ]);

        $this->assertEquals('A new name', $response->json('data.name'));
        $this->assertEquals('A new name', $category->fresh()->name);
        $this->assertEquals('Category description', $category->fresh()->description);
    }

    /** @test */
    public function it_deletes_category()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $category = factory(Category::class)->create();

        $response = $this->actingAs($user, 'api')
            ->delete('/api/categories/' . $category->id);

        $response->assertStatus(200);
    }
}
