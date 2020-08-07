<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('category_id');
            $table->integer('time_id');
            $table->integer('tag_id')->nullable();
            $table->string('top_image_path')->nullable();
            $table->string('ingredient');
            $table->string('step');
            $table->string('memo1_title')->nullable();
            $table->string('memo1_content')->nullable();
            $table->string('memo1_image')->nullable();
            $table->string('memo2_title')->nullable();
            $table->string('memo2_content')->nullable();
            $table->string('memo2_image_path')->nullable();
            $table->string('memo3_title')->nullable();
            $table->string('memo3_content')->nullable();
            $table->string('memo3_image_path')->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
