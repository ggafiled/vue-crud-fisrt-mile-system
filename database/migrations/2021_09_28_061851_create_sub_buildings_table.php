<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_buildings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('building_id')->unsigned();
            $table->string('projectName')->nullable(); //ชื่ออาคาร
            $table->string('floorSum')->nullable(); //ชั้นทั้งหมด
            $table->string('roomSum')->nullable(); //ห้องทั้งหมด
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('sub_buildings');
    }
}