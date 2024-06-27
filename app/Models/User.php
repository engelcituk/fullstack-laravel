<?php

namespace App\Models;

use App\Models\Builders\UserBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Base\User
{
    public function newEloquentBuilder($query): UserBuilder
    {
        return new UserBuilder($query);
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'owner_id', 'user_id');
    }

    public function getRedirectUrl(): string{

        return match ( $this->is_admin ){
            true => route('backoffice.dashboard.index'),
            false => route('dashboard'),
        };
    }
}
