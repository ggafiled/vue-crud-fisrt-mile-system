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
            $table->string('projectNameTxrt')->nullable();
            $table->string('projectNameSymphony')->nullable();
            $table->string('buildingSum')->nullable();
            $table->string('buildingNumber')->nullable();
            $table->string('buildingFloor')->nullable();
            $table->string('unitFloor')->nullable();
            $table->string('fmProgress')->nullable();
            // $table->bigInteger('fmProgress_id')->unsigned();
            // $table->bigInteger('teamserway_id')->unsigned();
            $table->string('teamserway')->nullable();
            $table->date('surweyDate')->nullable();
            $table->string('ifcccType')->nullable();
            $table->string('ifcccStatus')->nullable();
            // $table->bigInteger('ifcccStatus_id')->unsigned();
            $table->string('wallboxType')->nullable();
            $table->string('wallboxStatus')->nullable();
            // $table->bigInteger('wallboxStatus_id')->unsigned();
            $table->string('microductType')->nullable();
            $table->string('microductStatus')->nullable();
            // $table->bigInteger('microductStatus_id')->unsigned();

            $table->string('microductType1')->nullable();//blow
            $table->string('microductType2')->nullable();//blow
            $table->string('microductSize')->nullable();//blow
            $table->string('microductFloor')->nullable();//blow

            // $table->bigInteger('blowStatus_id')->unsigned();
            $table->string('blowStatus')->nullable();//blow
            $table->string('blowCore')->nullable();//blow

            $table->string('convertionalType')->nullable();//convertional
            $table->string('convertionalFloor')->nullable();//convertional

            $table->string('vertically')->nullable();//convertional
            $table->string('verticallyType')->nullable();//convertional
            // $table->bigInteger('verticallyType_id')->unsigned();

            $table->string('buildingStatus')->nullable();//convertional
            $table->string('buildingDate')->nullable();//convertional

            // $table->bigInteger('spliceStatus_id')->unsigned();
            $table->string('spliceStatus')->nullable();
            $table->string('spliceCore')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');

            // $table->foreign('teamserway_id')
            // ->references('id')
            // ->on('teamserways')
            // ->onDelete('cascade');
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
