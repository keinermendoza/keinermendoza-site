<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

#[Fillable(['resource', 'description', 'is_public'])]
class Image extends Model
{
    use HasFactory;
    public function url() {
        return route('image.public', [$this->id]);
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
