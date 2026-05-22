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

    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'is_public'
    ];

    public function get_edit_url() 
    {
        return route('tags.edit', [$this->id]);
    }

    public function get_update_url() 
    {
        return route('tags.update', [$this->id]);
    }
    
    public function get_destroy_url() 
    {
        return route('tags.destroy', [$this->id]);
    }

    public function canBeDeleted(): bool
    {   
        return !$this->projects()->exists() && !$this->posts()->exists();
    }

    // TODO
    public function getRelationedIntanceTitles(): string
    {
        return "";
    }

    public function projects() 
    {
        return $this->belongsToMany(Tag::class, "tags_projects");
    }

    public function posts() 
    {
        return $this->belongsToMany(Tag::class, "tags_posts");
    }
}
