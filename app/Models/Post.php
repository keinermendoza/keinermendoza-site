<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scope\IsPublicScope;
use App\Models\Tag;

class Post extends Model
{
    use IsPublicScope;

    public function tags() {
        return $this->belongsToMany(Tag::class, "tags_posts");
    }
}
