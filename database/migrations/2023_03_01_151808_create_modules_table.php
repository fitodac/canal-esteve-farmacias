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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->nullable()->constrained();
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('teacher')->nullable();
            $table->string('tag')->nullable();
            $table->string('video');
            $table->unsignedBigInteger('parent_module_id')->nullable();
            $table->foreign('parent_module_id')->references('id')->on('modules');
            $table->boolean('active')->default(true);
            $table->integer('order')->unsigned()->default(0);
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
        Schema::dropIfExists('modules');
    }
};
