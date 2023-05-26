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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->nullable()->constrained();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('image_width')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->text('caution')->nullable();
            $table->string('slug')->nullable();
            $table->string('category_slug')->nullable();
            $table->boolean('natural')->default(false)->nullable();
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
        Schema::dropIfExists('products');
    }
};
