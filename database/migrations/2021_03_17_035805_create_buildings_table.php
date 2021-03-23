<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('buildingId')->index();
            $table->string('fmCode')->nullable();
            $table->string('contactName')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('area')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('roomNumber')->nullable();
            $table->integer('numberLayer')->nullable();
            $table->string('detailAdress')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longtude')->nullable();
            $table->string('priceSquare')->nullable();
            $table->date('workingTime')->nullable();
            $table->currency('blance')->nullable();
            $table->string('developer')->nullable();
            $table->string('grade')->nullable();
            $table->string('note')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('buildings');
    }
}