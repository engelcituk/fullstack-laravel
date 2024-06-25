<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// php artisan make:model Lesson -m
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id('lesson_id');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                ->references( 'course_id')
                ->on('courses');

            $table->unsignedBigInteger('lesson_type_id');
            $table->foreign('lesson_type_id')
                ->references( 'lesson_type_id')
                ->on('lesson_types');

            $table->createdBy(); //está definida en una macro
            $table->updatedBy(); //está definida en una macro
            $table->deletedBy(); //está definida en una macro

            $table->string('name');
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
        Schema::dropIfExists('lessons');
    }
};
