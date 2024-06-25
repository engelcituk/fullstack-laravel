<?php

namespace App\Macros\Blueprint;

use Illuminate\Database\Schema\Blueprint;

final class UpdatedBy
{
    /**
     * Register any application services.
     */
    public function __invoke(): void
    {
        Blueprint::macro('updatedBy', function( string $autorTable = 'users', string $autorColumn = 'user_id'){

            $this->unsignedBigInteger( 'updated_by' )->nullable();

            $this->foreign('updated_by')
                ->references( $autorColumn )
                ->on($autorTable);
        });
    }


}

