<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('approve_by')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('modal_image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
