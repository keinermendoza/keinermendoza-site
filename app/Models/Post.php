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

    protected $fillable = [
        'title',
        'content',
        'image',
        'slug',
        'is_public'
    ];

    public function get_edit_url() {
        return route('posts.edit', [$this->id]);
    }
    public function get_update_url() {
        return route('posts.update', [$this->id]);
    }
    public function get_destroy_url() {
        return route('posts.destroy', [$this->id]);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, "tags_posts");
    }
}
