<?php
namespace App\Models\Scope;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

trait IsPublicScope {
    #[Scope]
    protected function public(Builder $query): void
    {
        $query->where('is_public', true);
    }
}