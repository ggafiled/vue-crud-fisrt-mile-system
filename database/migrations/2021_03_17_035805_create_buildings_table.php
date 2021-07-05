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
            $table->bigIncrements('id');
            $table->string('projectName')->nullable();
            $table->string('buildingSum')->nullable();
            $table->string('floorSum')->nullable();
            $table->string('roomSum')->nullable();
            $table->string('fmCode')->nullable();
            $table->string('nameNiti')->nullable();
            $table->string('phoneNiti')->nullable();
            $table->string('mailNiti')->nullable();
            $table->string('nameManager')->nullable();
            $table->string('phoneManager')->nullable();
            $table->string('mailManager')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('squadNumber')->nullable();
            $table->string('alleyName')->nullable();
            $table->string('roadName')->nullable();
            $table->string('districtName')->nullable();
            $table->string('provinceName')->nullable();
            $table->string('countyName')->nullable();
            $table->integer('postalCode')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->string('contractSell')->nullable();
            $table->date('contractDate')->nullable();
            $table->string('spendSpace')->nullable();
            $table->string('condition')->nullable();
            $table->string('contractPeriod')->nullable();
            $table->string('areaN')->nullable();
            $table->string('bbN')->nullable();
            $table->string('area3BB')->nullable();
            $table->string('areaTrue')->nullable();
            $table->string('areaTrueNew')->nullable();
            $table->string('areaAis')->nullable();
            $table->string('areaFiberNet')->nullable();
            $table->string('operatingTime')->nullable();
            $table->timestamps();
            $table->softDeletes();


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
