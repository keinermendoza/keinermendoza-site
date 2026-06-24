<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
class UserAPITest extends TestCase
{
    /**
     * testing user API endpoints.
     */
    use RefreshDatabase;
    public function test_users_endpoint_returns_all_users_when_current_user_is_admin(): void
    {
        User::factory()->count(2)->create();
        Sanctum::actingAs(User::factory()->admin()->create());
        $users = User::all();

        $response = $this->getJson('/api/v1/users');
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

    public function test_validate_users_endpoint_returns_unauthorized_status_when_user_is_not_admin(): void
    {
        User::factory()->count(10)->create();
        Sanctum::actingAs(User::factory()->create());


        $response = $this->getJson('/api/v1/users');
        $response->assertStatus(403);
    }

    public function test_user_detail_endpoint_returns_specific_user_when_current_user_is_admin(): void
    {
        $users = User::factory()->count(2)->create();
        Sanctum::actingAs(User::factory()->admin()->create());

        $response = $this->getJson('/api/v1/users/2');
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

    public function test_validate_user_detail_endpoint_returns_unauthorized_status_when_user_is_not_admin(): void
    {
        User::factory()->count(10)->create();
        Sanctum::actingAs(User::factory()->create());

        $response = $this->getJson('/api/v1/users/2');
        $response->assertStatus(403);
    }

    public function test_user_edit_endpoint_allows_edition_and_returns_specific_user_when_current_user_is_admin(): void
    {
        $users = User::factory()->count(2)->create();
        Sanctum::actingAs(User::factory()->admin()->create());

        $response = $this->patchJson('/api/v1/users/2', [
            'name' => 'pepe'
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $users[1]->id,
                'name' => 'pepe',
                'email' => $users[1]->email,
                'created_at' => $users[1]->created_at->toJSON(),
                'updated_at' => $users[1]->updated_at->toJSON(),
                'is_admin' => $users[1]->is_admin
            ]
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $users[1]->id,
            'name' => 'pepe',
        ]);
    }

    public function test_validate_user_edit_endpoint_returns_unauthorized_status_when_user_is_not_admin(): void
    {
        Sanctum::actingAs(User::factory()->create());
        $users = User::factory()->count(10)->create();

        $response = $this->patchJson('/api/v1/users/2', [
            'name' => 'pepe'
        ])->assertStatus(403);

        $this->assertDatabaseMissing('users', [
            'id' => $users[1]->id,
            'name' => 'pepe',
        ]);
    }

    public function test_validate_user_edit_endpoint_returns_error_message_when_invalid_email(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        $users = User::factory()->count(2)->create();

        $response = $this->patchJson('/api/v1/users/2', [
            'email' => 'pepe'
        ]);
        $response->assertJson([
            'errors' => [
                'email' => [
                    'The email field must be a valid email address.'
                ]
            ]
        ])->assertStatus(422);


        $this->assertDatabaseMissing('users', [
            'id' => $users[1]->id,
            'email' => 'pepe'
        ]);
    }

    public function test_user_store_endpoint_returns_user_object_when_current_user_is_admin(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());

        $response = $this->postJson('/api/v1/users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'data' => [
                'name' => 'pepe',
                'email' => 'pepe@gmail.com',
            ]
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
        ]);
    }


    public function test_validate_user_store_endpoint_returns_unauthorized_status_when_user_is_not_admin(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/v1/users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(403);

        $this->assertDatabaseMissing('users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
        ]);
    }

    public function test_validate_user_store_endpoint_returns_error_message_when_incomplete_payload(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());

        $response = $this->postJson('/api/v1/users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com'
        ]);
        $response->assertJson([
            'errors' => [
                'password' => [
                    'The password field is required.'
                ]
            ]
        ])->assertStatus(422);


        $this->assertDatabaseMissing('users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com'
        ]);
    }

    public function test_user_delete_endpoint_returns_no_body_response_when_current_user_is_admin(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        User::factory()->create(['name' => 'pepe', 'email' => 'pepe@gmail.com']);

        $this->assertDatabaseHas('users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
        ]);

        $response = $this->delete('/api/v1/users/2');
        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', [
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
        ]);
    }

}
