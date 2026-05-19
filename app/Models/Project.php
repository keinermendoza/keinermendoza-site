<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\IsPublicScope;
use App\Models\Traits\GetImageURL;

class Project extends Model
{
    use IsPublicScope;
    use GetImageURL;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'is_public'
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class, "tags_projects")->public();
    }
}
