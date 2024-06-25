<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// php artisan make:model Course -m
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references( 'category_id')
                ->on('categories');


            $table->owner(); //está definida en una macro, es el autor
            $table->createdBy(); //está definida en una macro
            $table->updatedBy(); //está definida en una macro
            $table->deletedBy(); //está definida en una macro

            $table->string('name')->unique();
            $table->slug(); //está definida en una macro
            $table->string('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
