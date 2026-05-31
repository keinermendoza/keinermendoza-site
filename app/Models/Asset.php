<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

class Asset extends Model
{
    public $timestamps = false;
    protected $fillable = [
        "name",
        "path",
        "type"
    ];

    #[Scope]
    protected function images(Builder $query): void
    {
        $query->where('type', "image");
    }

    public function get_edit_url() {
        return route('assets.edit', [$this->id]);
    }
    public function get_update_url() {
        return route('assets.update', [$this->id]);
    }
    public function get_destroy_url() {
        return route('assets.destroy', [$this->id]);
    }


    static function getType(UploadedFile $file) : string
    {
        return Str::startsWith($file->getMimeType(), "image") ? "image" : "doc";
    }

    public function isImage(): bool
    {
        return $this->type === "image";
    }

    protected function imageURL(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->isImage() ? asset("storage/" . $this->path) : null
        );
    }
}
