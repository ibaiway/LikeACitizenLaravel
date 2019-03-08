<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_category', function (Blueprint $table) {
          $table->unsignedBigInteger('app_id');
          $table->foreign('app_id')->references('id')
          ->on('apps')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->unsignedBigInteger('category_id');
          $table->foreign('category_id')->references('id')
          ->on('categorys')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_category');
    }
}
