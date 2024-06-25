<?php

namespace App\Macros\Blueprint;

use Illuminate\Database\Schema\Blueprint;

final class CreatedBy
{
    
    public function __invoke(): void
    {
        Blueprint::macro('createdBy', function( string $autorTable = 'users', string $autorColumn = 'user_id'){

            $this->unsignedBigInteger( 'created_by' )->nullable();

            $this->foreign('created_by')
                ->references( $autorColumn )
                ->on($autorTable);
        });
    }


}

