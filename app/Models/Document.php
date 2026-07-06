<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\IsPublicScope;
use Illuminate\Support\Facades\Storage;

#[Fillable('title', 'path', 'is_cv', 'is_public')]
class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;
    use IsPublicScope;

    public function url() {
        return route('document.public', [$this->id]);
    }

    public function deleteAssociatedFile() {
        if ($this->path && Storage::disk('local')->exists($this->path)) {
            Storage::disk('local')->delete($this->path);
        }
    }

    public function getAssociatedFile() {
        return Storage::disk('local')->path($this->path);
    }

    public function setAsCV() {
        Document::where('id', '<>', $this->id)->update(['is_cv' => false]);
    }

    static public function getCVPath() {
        $path = Document::where('is_cv', true)->value('path');
        if ($path) {
            return Storage::disk('local')->path($path);
        }

    }
}
