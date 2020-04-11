<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_api_user_retrieve_current_user()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('/api/user');

        $response->assertStatus(200);
        $this->assertEquals($user->email, $response->json('email'));
    }
}
