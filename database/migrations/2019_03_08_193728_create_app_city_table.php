<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_city', function (Blueprint $table) {
          $table->unsignedBigInteger('app_id');
          $table->foreign('app_id')->references('id')
          ->on('apps')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->unsignedBigInteger('city_id');
          $table->foreign('city_id')->references('id')
          ->on('cities')
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
        Schema::dropIfExists('app_city');
    }
}
