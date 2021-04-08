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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('fmCode')->nullable();
            $table->bigInteger('member_id')->nullable();
            $table->string('buildingName')->nullable();
            $table->string('detailAdress')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('zone')->nullable();
            $table->double('area')->nullable();
            $table->integer('townNumber')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('roomNumber')->nullable();
            $table->timestamp('contract')->nullable();
            $table->time('contractTime')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longtude')->nullable();
            $table->double('priceSquare')->nullable();
            $table->timestamp('workingTime')->nullable();
            $table->double('blance')->nullable();
            $table->string('developer')->nullable();
            $table->string('grade')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}