<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('building_id')->index();
            $table->string('isp')->nullable();
            $table->string('ispCode')->nullable();
            $table->string('fees')->nullable();
            $table->string('confirming')->nullable();
            $table->bigInteger('teams_id')->index();
            $table->string('remark')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('time')->nullable();
            $table->string('status')->nullable();
            $table->string('subStatus')->nullable();
            $table->timestamp('dateConnect')->nullable();
            $table->timestamp('dateDisconnect')->nullable();
            $table->timestamps();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');
            $table->foreign('teams_id')
            ->references('id')
            ->on('teams')
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
        Schema::dropIfExists('planings');
    }
}