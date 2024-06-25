<?php

namespace App\Traits\Models;


trait DeletedBy
{

    public static function bootDeletedBy(): void {

        static::deleting( function($model) {
            if( auth()->checked() ){
                $model->deleted_by = auth()->id();
                $model->save();
            }
        });

    }
}

