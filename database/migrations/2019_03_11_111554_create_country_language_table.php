<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_language', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')
            ->on('countries')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')
            ->on('languages')
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
        Schema::dropIfExists('country_language');
    }
}
