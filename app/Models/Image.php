<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

#[Fillable(['resource', 'description', 'is_public'])]
class Image extends Model
{
    use HasFactory, HasUuids;

     public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function url() {
        return route('image.public', [$this->uuid]);
    }

    public function deleteAssociatedImage() {
        if ($this->resource && Storage::disk('local')->exists($this->resource)) {
            Storage::disk('local')->delete($this->resource);
        }
    }

    public function getAssociatedImage() {
        return Storage::disk('local')->path($this->resource);
    }
}
