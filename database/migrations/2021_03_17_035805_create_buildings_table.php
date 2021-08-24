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
            $table->bigInteger('area3BB_id')->unsigned();
            $table->bigInteger('areaAis_id')->unsigned();
            $table->bigInteger('areaFibetNet_id')->unsigned();
            $table->bigInteger('areaTrue_id')->unsigned();
            $table->bigInteger('workTime_id')->unsigned();
            $table->bigInteger('nameSale_id')->unsigned();
            $table->bigInteger('payment_id')->unsigned();
            $table->bigInteger('operater_id')->unsigned();
            $table->bigInteger('providertrue_id')->unsigned();
            $table->bigInteger('nameserway_id')->unsigned();
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
            $table->date('contractDateEnd')->nullable();
            $table->string('spendSpace')->nullable();
            $table->string('condition')->nullable();
            $table->string('contractPeriod')->nullable();
            $table->string('reNewContact')->nullable();
            $table->string('balance')->nullable();
            $table->string('areaN')->nullable();
            $table->string('bbN')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('area3BB_id')
            ->references('id')
            ->on('area3_b_b_s')
            ->onDelete('cascade');

            $table->foreign('areaAis_id')
            ->references('id')
            ->on('area_ais')
            ->onDelete('cascade');

            $table->foreign('areaFibetNet_id')
            ->references('id')
            ->on('area_fibet_nets')
            ->onDelete('cascade');

            $table->foreign('areaTrue_id')
            ->references('id')
            ->on('areatrues')
            ->onDelete('cascade');

            $table->foreign('workTime_id')
            ->references('id')
            ->on('worktimes')
            ->onDelete('cascade');

            $table->foreign('nameSale_id')
            ->references('id')
            ->on('salefms')
            ->onDelete('cascade');

            $table->foreign('payment_id')
            ->references('id')
            ->on('Payments')
            ->onDelete('cascade');

            $table->foreign('operater_id')
            ->references('id')
            ->on('Operaters')
            ->onDelete('cascade');

            $table->foreign('providertrue_id')
            ->references('id')
            ->on('providertrues')
            ->onDelete('cascade');

            $table->foreign('nameserway_id')
            ->references('id')
            ->on('Teamserways')
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
