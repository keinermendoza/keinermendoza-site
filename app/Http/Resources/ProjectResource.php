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
            'subtitle' => $this->subtitle,
            'importance' => $this->importance,
            'content' => $this->content,
            'image' => $this->image ? new ImageResource($this->image) : null,
            'slug' => $this->slug,
            'is_public' => (bool) $this->is_public,
            'created_at' => $this->created_at->format('d/m/Y - g:i A'),
            'updated_at' => $this->updated_at->format('d/m/Y - g:i A'),
            'tags' => TagRelationshipResource::collection($this->tags)
        ];
    }
}
