<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['resource', 'description', 'is_public'])]
class Image extends Model
{
    use HasFactory;
    public function url() {
        return route('image.public', [$this->id]);
    }

}
