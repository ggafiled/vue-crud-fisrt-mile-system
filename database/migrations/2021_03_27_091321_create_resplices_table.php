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
            $table->bigInteger('building_id')->index();
            $table->string('zone')->index();
            $table->bigInteger('technicianTeamStart')->index();
            $table->timestamp('startDate')->nullable();
            $table->timestamp('planDate')->nullable();
            $table->timestamp('planFinish')->nullable();
            $table->timestamp('planStart')->nullable();
            $table->timestamp('planComplete')->nullable();
            $table->bigInteger('technicianTeamEnd')->index();
            $table->timestamps();

            // $table->foreign('building_id')
            // ->references('id')
            // ->on('buildings')
            // ->onDelete('cascade');
            // $table->foreign('technicianTeamStart')
            // ->references('id')
            // ->on('teams')
            // ->onDelete('cascade');
            // $table->foreign('technicianTeamEnd')
            // ->references('id')
            // ->on('teams')
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
        Schema::dropIfExists('resplices');
    }
}