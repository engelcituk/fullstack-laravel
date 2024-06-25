<?php

namespace App\Macros\Blueprint;

use Illuminate\Database\Schema\Blueprint;

final class DeletedBy
{

    public function __invoke(): void
    {
        Blueprint::macro('deletedBy', function( string $autorTable = 'users', string $autorColumn = 'user_id'){

            $this->unsignedBigInteger( 'deleted_by' )->nullable();

            $this->foreign('deleted_by')
                ->references( $autorColumn )
                ->on($autorTable);
        });
    }


}

