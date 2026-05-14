<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scope\IsPublicScope;

class Tag extends Model
{
    use IsPublicScope;

    public function projects() {
        return $this->belongsToMany(Tag::class, "tags_projects");
    }

    public function posts() {
        return $this->belongsToMany(Tag::class, "tags_posts");
    }
}
