<?php 
namespace App\Models\Traits;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait SetSlug {
    public function slug(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::slug($value),
        );
    }
}
