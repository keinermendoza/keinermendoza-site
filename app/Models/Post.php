<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Traits\IsPublicScope;
use App\Models\Traits\GetImageURL;

class Post extends Model
{
    use IsPublicScope;
    use GetImageURL;

    public function tags() {
        return $this->belongsToMany(Tag::class, "tags_posts")->public();
    }
}
