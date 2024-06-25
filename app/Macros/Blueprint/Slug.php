<?php

namespace App\Macros\Blueprint;

use Illuminate\Database\Schema\Blueprint;

final class Slug
{
    /**
     * Register any application services.
     */
    public function __invoke(): void
    {
        Blueprint::macro('slug', function( int $length = 191){

            $this->string( 'slug', $length )->unique();
        });
    }


}

