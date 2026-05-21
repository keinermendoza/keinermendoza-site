<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\IsPublicScope;
use App\Models\Traits\GetImageURL;
// use App\Models\Traits\SetSlug;
class Project extends Model
{
    use IsPublicScope;
    use GetImageURL;
    // use SetSlug;

    protected $fillable = [
        'title',
        'content',
        'image',
        'slug',
        'is_public'
    ];

    public function get_edit_url() {
        return route('projects.edit', [$this->id]);
    }
    public function get_update_url() {
        return route('projects.update', [$this->id]);
    }
    public function get_destroy_url() {
        return route('projects.destroy', [$this->id]);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, "tags_projects")->public();
    }
}
