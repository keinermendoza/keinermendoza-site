<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
class UserApiTest extends TestCase
{
    /**
     * testing user API endpoints.
     */
    use RefreshDatabase;
    public function test_users_endpoint_returns_all_users_when_current_user_is_admin(): void
    {
        User::factory()->count(2)->create();
        Sanctum::actingAs(User::factory()->create());
        $users = User::all();

        $response = $this->get('/api/v1/users');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'id' => $users[0]->id,
                    'name' => $users[0]->name,
                    'email' => $users[0]->email,
                    'created_at' => $users[0]->created_at->toJSON(),
                    'updated_at' => $users[0]->updated_at->toJSON(),
                    'is_admin' => $users[0]->is_admin
                ],
                [
                    'id' => $users[1]->id,
                    'name' => $users[1]->name,
                    'email' => $users[1]->email,
                    'created_at' => $users[1]->created_at->toJSON(),
                    'updated_at' => $users[1]->updated_at->toJSON(),
                    'is_admin' => $users[1]->is_admin
                ],
                [
                    'id' => $users[2]->id,
                    'name' => $users[2]->name,
                    'email' => $users[2]->email,
                    'created_at' => $users[2]->created_at->toJSON(),
                    'updated_at' => $users[2]->updated_at->toJSON(),
                    'is_admin' => $users[2]->is_admin
                ]
            ]
        ]);
    }

    public function test_users_endpoint_returns_redirect_status_when_user_is_not_admin(): void
    {
        User::factory()->count(10)->create();

        $response = $this->get('/api/v1/users');
        $response->assertStatus(302);
    }

    public function test_user_detail_endpoint_returns_specific_user_when_current_user_is_admin(): void
    {
        $users = User::factory()->count(2)->create();
        Sanctum::actingAs(User::factory()->create());

        $response = $this->get('/api/v1/users/2');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $users[1]->id,
                'name' => $users[1]->name,
                'email' => $users[1]->email,
                'created_at' => $users[1]->created_at->toJSON(),
                'updated_at' => $users[1]->updated_at->toJSON(),
                'is_admin' => $users[1]->is_admin
            ]
        ]);
    }

    public function test_user_detail_endpoint_returns_redirect_status_when_user_is_not_admin(): void
    {
        User::factory()->count(10)->create();

        $response = $this->get('/api/v1/users/2');
        $response->assertStatus(302);
    }
}
