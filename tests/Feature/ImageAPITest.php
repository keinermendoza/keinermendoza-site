<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;

use Tests\TestCase;

class ImageAPITest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */


    public function test_admin_user_can_upload_image()
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        Storage::fake('local');

        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->postJson('/api/v1/images', [
            'file' => $file,
            'description' => 'Test image',
        ]);

        $response->assertStatus(201);
        Storage::disk('local')->assertExists('images/' . $file->hashName());
    }

    public function test_validate_normal_user_cannot_upload_image()
    {
        Sanctum::actingAs(User::factory()->create());
        Storage::fake('local');

        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->postJson('/api/v1/images', [
            'file' => $file,
            'description' => 'Test image',
        ]);

        $response->assertStatus(403);
        Storage::disk('local')->assertMissing('images/' . $file->hashName());
    }

    public function test_image_detail_endpoint_returns_file_when_image_is_public()
    {
        Sanctum::actingAs(User::factory()->create());
        Storage::fake('local');
        $file = UploadedFile::fake()->image('photo.jpg');

        $path = $file->store('images', 'local');

        $image = Image::factory()->public()->create([
            'resource' => $path
        ]);

        $this->getJson('/api/v1/images/'. $image->id)
        ->assertStatus(200)
        ->assertHeader('content-type', 'image/jpeg');
    }

    public function test_image_detail_endpoint_returns_not_found_message_when_image_is_public()
    {
        Sanctum::actingAs(User::factory()->create());
        Storage::fake('local');
        $file = UploadedFile::fake()->image('photo.jpg');

        $path = $file->store('images', 'local');
        # instancia de imagem craida com atributo is_public como false
        $image = Image::factory()->create([
            'resource' => $path
        ]);

        $this->getJson('/api/v1/images/'. $image->id)
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Imagem não encontrada.'
        ]);
    }

    public function test_list_endpoint_returns_collection_of_image_objects()
    {
        $image = Image::factory()->count(2)->create();

        Sanctum::actingAs(User::factory()->admin()->create());
        $this->getJson('/api/v1/images/')
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                [
                    'id' => 1,
                    'image' => $image[0]->url()
                ],
                [
                    'id' => 2,
                    'image' => $image[1]->url()
                ]
            ]
        ]);
    }

}
