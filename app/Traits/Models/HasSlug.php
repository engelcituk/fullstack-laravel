<?php

namespace App\Traits\Models;

use  Illuminate\Support\Str;

trait HasSlug
{

    public static function bootHasSlug(): void {

        static::saving( function($model) {
            if( auth()->checked() ){
                $model->slug = Str::slug($model->name);
            }
        });

    }
}

