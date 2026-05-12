<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'is_public',
        'user_id',
    ];
}
