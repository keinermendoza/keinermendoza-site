<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactMessageResource extends JsonResource
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
            'email' => $this->email,
            'content' => $this->content,
            'phone' => $this->phone,
            'readed' => (bool) $this->readed,
            'is_spam' => (bool) $this->is_spam,
            'created_at' => $this->created_at->format('d/m/Y - g:i A'),
            'updated_at' => $this->updated_at->format('d/m/Y - g:i A'),
        ];
    }
}
