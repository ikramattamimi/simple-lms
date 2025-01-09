<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 255);
            $table->string('description', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('user_course', function (Blueprint $table) {
            $table->uuid('course_id');
            $table->uuid('user_id');
            $table->boolean('is_active')->default(true);
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['course_id', 'user_id']);
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
