<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\IsPublicScope;
use App\Models\Traits\GetImageURL;

class Tag extends Model
{
    use IsPublicScope;
    use GetImageURL;
    
    public $timestamps = false;

    public function projects() {
        return $this->belongsToMany(Tag::class, "tags_projects");
    }

    public function posts() {
        return $this->belongsToMany(Tag::class, "tags_posts");
    }
}
