<?php 
namespace App\Models\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property string|null $image 
 */
trait GetImageURL {
    protected function imageURL(): Attribute 
    {
        return Attribute::make(
            get: fn () => $this->image ? asset("storage/" . $this->image) : null
        );
    }
}