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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image')->nullable();

            // $table->bigInteger('categories_id')->unsigned()->nullable();
            // $table->foreign('categories_id')->references('id')->on('categories');
            // $table->bigInteger('users_id')->unsigned()->nullable();
            // $table->foreign('users_id')->references('id')->on('users');
            //------------------ =====
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
