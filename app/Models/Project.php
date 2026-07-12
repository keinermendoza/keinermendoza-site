<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\IsPublicScope;
use App\Models\Traits\GetImageURL;
// use App\Models\Traits\SetSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Image;

class Project extends Model
{
    use IsPublicScope;
    use GetImageURL;
    use HasFactory;
    // use SetSlug;

    //  public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    protected $fillable = [
        'title',
        'subtitle',
        'importance',
        'content',
        'image_id',
        'slug',
        'is_public'
    ];

    public function get_absolute_url() {
        return route('projects.show', [$this->slug]);
    }

    public function image() {
        return $this->belongsTo(Image::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, "tags_projects");
    }
}
