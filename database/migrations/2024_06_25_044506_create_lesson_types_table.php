<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// php artisan make:model LessonType -m
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lesson_types', function (Blueprint $table) {
            $table->id('lesson_type_id');

            $table->createdBy(); //está definida en una macro
            $table->updatedBy(); //está definida en una macro
            $table->deletedBy(); //está definida en una macro

            $table->string('name');
            $table->slug(); //está definida en una macro

            $table->boolean('is_active')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_types');
    }
};
