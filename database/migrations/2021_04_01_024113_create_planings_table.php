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
        Schema::disableForeignKeyConstraints();
        Schema::create('planings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->integer('phoneNumber1')->nullable();
            $table->integer('phoneNumber2')->nullable();
            $table->string('buildingId')->index();
            $table->string('numberLayer')->index();
            $table->integer('floor')->index();
            $table->string('roomNumber')->index();
            $table->string('isp')->nullable();
            $table->string('ispCode')->nullable();
            $table->integer('memberNumber')->nullable();
            $table->string('Fees')->nullable();
            $table->string('confirming')->nullable();
            $table->string('Team')->nullable();
            $table->date('date')->nullable();
            $table->timestamp('time')->nullable();
            $table->string('status')->nullable();
            $table->string('subStatus')->nullable();
            $table->date('dateConnect')->nullable();
            $table->date('dateDisconnect')->nullable();
            $table->timestamps();

            $table->foreign('buildingId')
            ->references('buildingId')
            ->on('buildings')
            ->onDelete('cascade');
            $table->foreign('numberLayer')
            ->references('numberLayer')
            ->on('buildings')
            ->onDelete('cascade');
            $table->foreign('floor')
            ->references('floor')
            ->on('buildings')
            ->onDelete('cascade');
            $table->foreign('roomNumber')
            ->references('roomNumber')
            ->on('buildings')
            ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('planings');
    }
}