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
            $table->bigIncrements('id');
            $table->bigInteger('saleFm_id')->unsigned();
            $table->bigInteger('paymentType_id')->unsigned();
            $table->bigInteger('areas_id')->unsigned();
            $table->bigInteger('bbns_id')->unsigned();
            $table->bigInteger('area3bb_id')->unsigned();
            $table->bigInteger('areaTrue_id')->unsigned();
            $table->bigInteger('areaAis_id')->unsigned();
            $table->bigInteger('areaFibernet_id')->unsigned();
            $table->bigInteger('workTime_id')->unsigned();
            $table->string('projectName')->nullable();
            $table->string('buildingSum')->nullable();
            $table->string('floorSum')->nullable();
            $table->string('roomSum')->nullable();
            $table->string('fmCode')->nullable();
            $table->string('nameManager')->nullable();
            $table->string('phoneManager')->nullable();
            $table->string('mailManager')->nullable();
            $table->string('nameNiti')->nullable();
            $table->string('phoneNiti')->nullable();
            $table->string('mailNiti')->nullable();
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
            $table->date('contractDate')->nullable();
            $table->date('contractDateEnd')->nullable();
            $table->string('condition')->nullable();
            $table->string('contractPeriod')->nullable();
            $table->string('reNewContact')->nullable();
            $table->string('balance')->nullable();
            // $table->string('areaN')->nullable();
            // $table->string('bbN')->nullable();
            // $table->string('area3BB')->nullable();
            // $table->string('areaTrue')->nullable();
            $table->string('areaTrueNew')->nullable();
            // $table->string('areaAis')->nullable();
            // $table->string('areaFiberNet')->nullable();
            // $table->string('operatingTime')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('saleFm_id')
            ->references('id')
            ->on('salefms')
            ->onDelete('cascade');

            $table->foreign('paymentType_id')
            ->references('id')
            ->on('payments')
            ->onDelete('cascade');

            $table->foreign('areas_id')
            ->references('id')
            ->on('areas')
            ->onDelete('cascade');

            $table->foreign('bbns_id')
            ->references('id')
            ->on('bbns')
            ->onDelete('cascade');

            $table->foreign('area3bb_id')
            ->references('id')
            ->on('area3bbs')
            ->onDelete('cascade');

            $table->foreign('areaTrue_id')
            ->references('id')
            ->on('area_trues')
            ->onDelete('cascade');

            $table->foreign('areaAis_id')
            ->references('id')
            ->on('area_ais')
            ->onDelete('cascade');

            $table->foreign('areaFibernet_id')
            ->references('id')
            ->on('area_fiber_nets')
            ->onDelete('cascade');

            $table->foreign('workTime_id')
            ->references('id')
            ->on('worktimes')
            ->onDelete('cascade');

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