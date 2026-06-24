<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TagRelationshipResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image ? $this->image->url() : null,
            'slug' => $this->slug,
            'is_public' => (int)$this->is_public,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tags' => TagRelationshipResource::collection($this->tags)
        ];
    }
}
