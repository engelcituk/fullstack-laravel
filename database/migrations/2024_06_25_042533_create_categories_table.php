<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// php artisan make:model Category -m

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');


            $table->createdBy(); //está definida en una macro
            $table->updatedBy(); //está definida en una macro
            $table->deletedBy(); //está definida en una macro

            $table->string('name');
            $table->slug(); //está definida en una macro
            $table->string('description')->nullable();


            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
