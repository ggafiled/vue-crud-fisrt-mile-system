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
        Schema::enableForeignKeyConstraints();
        Schema::create('planings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('building_id')->unsigned();
            $table->bigInteger('technician_id')->unsigned();
            $table->bigInteger('problemsolution_id')->unsigned();
            $table->bigInteger('teamtechnician_id')->unsigned();
            $table->bigInteger('callver_id')->unsigned();
            $table->bigInteger('callverstatus_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('tel')->nullable();
            $table->string('tel2')->nullable();
            $table->string('theBuilding')->nullable();
            $table->string('floor')->nullable();
            $table->string('room')->nullable();
            $table->string('isp')->nullable();
            $table->string('agent')->nullable();
            $table->string('circuit')->nullable();
            $table->string('entranceFee')->nullable();
            $table->string('jobType')->nullable();
            $table->date('appointmentDate')->nullable();
            $table->time('appointmentTime')->nullable();
            $table->string('technicianPlaning')->nullable();
            $table->string('idRequired')->nullable();
            $table->string('status')->nullable();
            $table->string('subStatus')->nullable();
            $table->string('reMark')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');

            $table->foreign('problemsolution_id')
            ->references('id')
            ->on('problem_solutions')
            ->onDelete('cascade');

            $table->foreign('teamtechnician_id')
            ->references('id')
            ->on('technicians')
            ->onDelete('cascade');

            $table->foreign('callver_id')
            ->references('id')
            ->on('callvers')
            ->onDelete('cascade');

            $table->foreign('callverstatus_id')
            ->references('id')
            ->on('callverstatuses')
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
        Schema::dropIfExists('planings');
    }
}
