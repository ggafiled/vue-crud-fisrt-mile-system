<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResplicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('resplices', function (Blueprint $table) {
            $table->id();
            $table->string('buildingId')->index();
            $table->integer('numberLayer')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('roomNumber')->nullable();
            $table->string('zone')->index();
            $table->string('technicianTeamStart')->index();
            $table->date('startDate')->index();
            $table->date('planDate')->index();
            $table->date('planFinish')->index();
            $table->date('planStart')->index();
            $table->date('planComplete')->index();
            $table->date('technicianTeamEnd')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resplices');
    }
}
