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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->string('address');
            $table->string('teacher_picture')->nullable();
            $table->foreignId('position_id')->constrained()->onDelete('cascade');
            $table->string('lessons')->nullable();
            $table->string('social_media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
