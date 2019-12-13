<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('address');
            $table->integer('town_id')->index()->unsigned()->nullable();
            $table->integer('rent');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->enum('pets', [
              'dogs negotiable',
              'cats negotiable',
              'pets negotiable',
              'not allowed'
            ])->nullable($value = false);
            $table->enum('washer_dryer', [
              'coin-op',
              'hook-ups',
              'machines in unit',
              'none'
            ])->nullable($value = false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
