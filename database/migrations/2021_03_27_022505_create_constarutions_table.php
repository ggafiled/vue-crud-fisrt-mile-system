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
            $table->bigInteger('teamserway_id')->unsigned();
            $table->date('surweyDate')->nullable();
            $table->string('ifcccType')->nullable();
            $table->bigInteger('ifcccStatus_id')->unsigned();
            $table->string('wallboxType')->nullable();
            $table->bigInteger('wallboxStatus_id')->unsigned();
            $table->string('microductType')->nullable();
            $table->bigInteger('microductStatus_id')->unsigned();

            $table->string('microductType1')->nullable();
            $table->string('microductType2')->nullable();
            $table->string('microductSize')->nullable();
            $table->string('microductFloor')->nullable();

            $table->bigInteger('blowStatus_id')->unsigned();
            $table->string('blowCore')->nullable();

            $table->string('convertionalType')->nullable();
            $table->string('convertionalFloor')->nullable();

            $table->string('vertically')->nullable();
            $table->bigInteger('verticallyType_id')->unsigned();

            $table->string('buildingStatus')->nullable();
            $table->string('buildingDate')->nullable();

            $table->bigInteger('spliceStatus_id')->unsigned();
            $table->string('spliceCore')->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');

            $table->foreign('teamserway_id')
            ->references('id')
            ->on('teamserways')
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