<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Image;

use Laravel\Sanctum\Sanctum;
class ProjectAPITest extends TestCase
{
    /**
     * testing user API endpoints.
     */
    use RefreshDatabase;
    public function test_projects_endpoint_returns_all_projects_when_current_user_is_admin(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        $tags = Tag::factory()->count(3)->create();

        $project_1 = Project::factory()->create();
        $project_2 = Project::factory()->hasAttached($tags)->create();

        $this->getJson('/api/v1/projects')
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                [
                    'id' => $project_1->id,
                    'title' => $project_1->title,
                    'content' => $project_1->content,
                    'image' => $project_1->image,
                    'slug' => $project_1->slug,
                    'is_public' => $project_1->is_public,
                    'created_at' => $project_1->created_at->toJSON(),
                    'updated_at' => $project_1->updated_at->toJSON(),
                    'tags' => []
                ],
                [
                    'id' => $project_2->id,
                    'title' => $project_2->title,
                    'content' => $project_2->content,
                    'image' => $project_2->image,
                    'slug' => $project_2->slug,
                    'is_public' => $project_2->is_public,
                    'created_at' => $project_2->created_at->toJSON(),
                    'updated_at' => $project_2->updated_at->toJSON(),
                    'tags' => [
                        [
                            'id' => $tags[0]->id,
                            'title' => $tags[0]->title,
                            'image' => $tags[0]->image,
                        ],
                        [
                            'id' => $tags[1]->id,
                            'title' => $tags[1]->title,
                            'image' => $tags[1]->image,
                        ],
                        [
                            'id' => $tags[2]->id,
                            'title' => $tags[2]->title,
                            'image' => $tags[2]->image,
                        ]
                    ]
                ],
            ]
        ]);
    }

    public function test_validate_projects_endpoint_returns_unauthorized_status_when_user_is_not_admin(): void
    {
        Sanctum::actingAs(User::factory()->create());
        Project::factory()->count(10)->create();


        $response = $this->getJson('/api/v1/projects');
        $response->assertStatus(403);
    }

    public function test_project_detail_endpoint_returns_specific_project_when_current_user_is_admin(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        $project = Project::factory()->create();

        $response = $this->getJson('/api/v1/projects/1');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $project->id,
                'title' => $project->title,
                'content' => $project->content,
                'image' => $project->image,
                'slug' => $project->slug,
                'is_public' => $project->is_public,
                'created_at' => $project->created_at->toJSON(),
                'updated_at' => $project->updated_at->toJSON(),
                'tags' => []
            ]
        ]);
    }

    public function test_validate_projects_detail_endpoint_returns_unauthorized_status_when_user_is_not_admin(): void
    {
        Project::factory()->create();
        Sanctum::actingAs(User::factory()->create());

        $response = $this->getJson('/api/v1/projects/1');
        $response->assertStatus(403);
    }

    public function test_projects_edit_endpoint_allows_change_title_and_returns_project_object_when_current_user_is_admin(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        $project = Project::factory()->create();

        $response = $this->patchJson('/api/v1/projects/' . $project->id, [
            'title' => 'new title'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $project->id,
                'title' => 'new title',
                'content' => $project->content,
                'image' => $project->image,
                'slug' => $project->slug,
                'is_public' => (int)$project->is_public,
                'created_at' => $project->created_at->toJSON(),
                'updated_at' => $project->updated_at->toJSON(),
                'tags' => []
            ]
        ]);

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'new title',
        ]);
    }

    public function test_projects_edit_endpoint_allows_change_image_and_returns_project_object(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        $project = Project::factory()->create();
        $image = Image::factory()->create();

        $response = $this->patchJson('/api/v1/projects/' . $project->id, [
            'image_id' => $image->id
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $project->id,
                'title' => $project->title,
                'content' => $project->content,
                'image' => $image->url(),
                'slug' => $project->slug,
                'is_public' => (int)$project->is_public,
                'created_at' => $project->created_at->toJSON(),
                'updated_at' => $project->updated_at->toJSON(),
                'tags' => []
            ]
        ]);

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'image_id' => $image->id,
        ]);

    }


    public function test_validate_projects_edit_endpoint_returns_error_message_when_invalid_image_id(): void
    {

        Sanctum::actingAs(User::factory()->admin()->create());
        $project = Project::factory()->create();

        # Giving id for non existing image
        $response = $this->patchJson('/api/v1/projects/' . $project->id, [
            'image_id' => 1
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            "message" => "The selected image id is invalid.",
            "errors" => [
                "image_id" => [
                    "The selected image id is invalid."
                ]
            ]
        ]);

        $this->assertDatabaseMissing('projects', [
            'id' => $project->id,
            'image_id' => 1,
        ]);

    }

    public function pass_user_store_endpoint_returns_user_object_when_current_user_is_admin(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());

        $response = $this->postJson('/api/v1/projects', [
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


    public function test_projects_store_endpoint_returns_project_object(): void
    {
        Sanctum::actingAs(User::factory()->admin()->create());
        $image = Image::factory()->create();

        $response = $this->postJson('/api/v1/projects/', [
            'title' => 'Title',
            'content' => '<h1>Content</h1>',
            'slug' => 'projeto-1',
            'image_id' => $image->id,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'data' => [
                'title' => 'Title',
                'slug' => 'projeto-1',
                'content' => '<h1>Content</h1>',
                'image' => $image->url(),
                'is_public' => 0,
                'tags' => []
            ]
        ]);

        $this->assertDatabaseHas('projects', [
            'id' => 1,
            'title' => 'Title',
            'content' => '<h1>Content</h1>',
            'image_id' => $image->id,
        ]);

    }

}
