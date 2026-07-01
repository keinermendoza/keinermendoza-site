<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class ContactMessageAPITest extends TestCase
{
    use RefreshDatabase;

    private User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        // Creamos un usuario administrador ficticio para las rutas protegidas
        $this->adminUser = User::factory()->create([
            'is_admin' => true
        ]);
    }


    public function test_public_user_can_send_a_contact_message()
    {
        $payload = [
            'email' => 'test@example.com',
            'content' => 'Olá, gostaria de solicitar um orçamento.',
            'phone' => '+5565999999999',
        ];

        $response = $this->postJson('/api/v1/messages', $payload);

        $response->assertStatus(201);

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'test@example.com',
            'content' => 'Olá, gostaria de solicitar um orçamento.',
            'phone' => '+5565999999999',
        ]);
    }


    public function test_public_user_cannot_send_message_with_invalid_data()
    {
        $payload = [
            'email' => 'not-an-email', // Correo inválido
            'content' => '',           // Requerido
        ];

        $response = $this->postJson(route('message.store'), $payload);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email', 'content']);
    }


    public function test_guest_cannot_access_protected_message_routes()
    {
        $message = ContactMessage::factory()->create();

        // Intentar listar sin autenticación
        $response = $this->getJson('/api/v1/messages')->assertStatus(401);

        // Intentar ver un mensaje específico
        $response = $this->getJson("/api/v1/messages/" . $message->id)->assertStatus(401);
    }


    public function test_admin_can_list_all_contact_messages()
    {
        ContactMessage::factory()->count(3)->create();

        Sanctum::actingAs($this->adminUser);
         $response = $this->getJson('/api/v1/messages');

        $response->assertStatus(200);
        // Puedes ajustar este assert dependiendo de la estructura exacta que devuelva tu ResourceCollection
        $response->assertJsonCount(3, 'data');
    }


    public function test_admin_can_show_a_specific_contact_message()
    {
        $message = ContactMessage::factory()->create();

        Sanctum::actingAs($this->adminUser);
        $response = $this->getJson("/api/v1/messages/{$message->id}");

        $response->assertStatus(200)
        ->assertJson([
        'data' => [
            'email' => $message->email
            ]
        ]);
    }


    public function test_admin_can_update_a_message_status_readed_and_spam()
    {
        $message = ContactMessage::factory()->create([
            'readed' => false,
            'is_spam' => false
        ]);

        $payload = [
            'readed' => true,
            'is_spam' => true,
        ];

        Sanctum::actingAs($this->adminUser);
        $response = $this->putJson("/api/v1/messages/{$message->id}", $payload);

        $response->assertStatus(200);

        $this->assertDatabaseHas('contact_messages', [
            'id' => $message->id,
            'readed' => true,
            'is_spam' => true,
        ]);
    }


    public function test_admin_can_delete_a_contact_message()
    {
        $message = ContactMessage::factory()->create();

        Sanctum::actingAs($this->adminUser);
        $response = $this->deleteJson("/api/v1/messages/{$message->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('contact_messages', [
            'id' => $message->id
        ]);
    }
}
