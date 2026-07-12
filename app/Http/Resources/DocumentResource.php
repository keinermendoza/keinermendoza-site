<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'file' => $this->url(),
            'is_public' => (bool) $this->is_public,
            'is_cv' => (bool) $this->is_cv,
            'created_at' => $this->created_at->format('d/m/Y - g:i A'),
            'updated_at' => $this->updated_at->format('d/m/Y - g:i A'),
        ];
    }
}
