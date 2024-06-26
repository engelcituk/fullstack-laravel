<?php

namespace App\Models;

use App\Models\Builders\CategoryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Base\Category
{
    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'category_id', 'category_id');
    }

}
