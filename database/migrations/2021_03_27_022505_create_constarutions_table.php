<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstarutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('constarutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('building_id')->unsigned();
            $table->string('projectNameTot')->nullable();
            $table->string('projectName3bb')->nullable();
            $table->string('projectNameTrue')->nullable();
            $table->string('projectNameAis')->nullable();
            $table->string('projectNameFiberNet')->nullable();
            $table->string('buildingSum')->nullable();
            $table->string('buildingNumber')->nullable();
            $table->string('buildingFloor')->nullable();
            $table->string('unitFloor')->nullable();
            $table->bigInteger('fmProgress_id')->unsigned();
            $table->bigInteger('surweyName_id')->unsigned();
            $table->date('surweyDate')->nullable();
            $table->string('ifcccType')->nullable();
            $table->bigInteger('ifccStatus_id')->unsigned();
            $table->string('wallboxType')->nullable();
            $table->bigInteger('microductStatus_id')->unsigned();
            $table->string('fiberMicroductType')->nullable();
            $table->string('fiberMicroduct1')->nullable();
            $table->string('fiberMicroduct2')->nullable();
            $table->string('fiberMicroductSize')->nullable();
            $table->string('fiberMicroductFloor')->nullable();
            $table->string('Blow')->nullable();
            $table->bigInteger('fiberBlowStatus_id')->unsigned();
            $table->string('fiberConvertionalType')->nullable();
            $table->string('fiberConvertionalFloor')->nullable();
            $table->string('fiberVertically')->nullable();
            $table->string('fiberVerticallyType')->nullable();
            $table->string('fiberBuildingStatus')->nullable();
            $table->string('blow')->nullable();
            $table->string('spliceStatus_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
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
        Schema::dropIfExists('constarutions');
    }
}
