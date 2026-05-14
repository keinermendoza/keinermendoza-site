<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scope\IsPublicScope;
class Project extends Model
{
    use IsPublicScope;

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
