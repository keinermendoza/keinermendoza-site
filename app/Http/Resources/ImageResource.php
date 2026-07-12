<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'description' => $this->description,
            'is_public' => (bool)$this->is_public,
            'image' => $this->url(),
            'created_at' => $this->created_at->format('d/m/Y - g:i A'),
            'updated_at' => $this->updated_at->format('d/m/Y - g:i A'),
        ];
    }
}
