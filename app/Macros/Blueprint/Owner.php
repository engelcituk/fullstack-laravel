<?php

namespace App\Macros\Blueprint;

use Illuminate\Database\Schema\Blueprint;

final class Owner
{

    public function __invoke(): void
    {
        Blueprint::macro('owner', function( string $autorTable = 'users', string $autorColumn = 'user_id'){

            $this->unsignedBigInteger( 'owner_id' )->nullable();

            $this->foreign('owner_id')
                ->references( $autorColumn )
                ->on($autorTable);
        });
    }


}

