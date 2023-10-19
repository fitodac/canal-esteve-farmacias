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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('format_id')->nullable()->constrained();
            $table->string('video')->nullable()->constrained();
            $table->string('subtitle')->nullable();
            $table->text('long_description')->nullable();
            $table->string('image')->nullable();
            $table->integer('score')->nullable();
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->json('teacher')->nullable();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('courses');
    }
};
