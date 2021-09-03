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
            $table->bigInteger('isp_id')->unsigned();
            $table->bigInteger('jobtype_id')->unsigned();
            $table->bigInteger('technician_id')->unsigned();
            $table->bigInteger('callver_id')->unsigned();
            $table->bigInteger('callverStatus_id')->unsigned();
            $table->bigInteger('ispId_id')->unsigned();
            $table->bigInteger('problemsolution_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('tel')->nullable();
            $table->string('tel2')->nullable();
            $table->string('theBuilding')->nullable();
            $table->string('floor')->nullable();
            $table->string('room')->nullable();
            // $table->string('isp')->nullable();
            $table->string('agent')->nullable();
            $table->string('circuit')->nullable();
            $table->string('entranceFee')->nullable();
            // $table->string('jobType')->nullable();
            $table->date('appointmentDate')->nullable();
            $table->time('appointmentTime')->nullable();
            // $table->string('idRequired')->nullable();
            // $table->string('status')->nullable();
            $table->string('subStatus')->nullable();
            $table->string('reMark')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');

            $table->foreign('isp_id')
            ->references('id')
            ->on('isps')
            ->onDelete('cascade');

            $table->foreign('jobtype_id')
            ->references('id')
            ->on('job_tpyes')
            ->onDelete('cascade');

            $table->foreign('technician_id')
            ->references('id')
            ->on('technicians')
            ->onDelete('cascade');

            $table->foreign('callver_id')
            ->references('id')
            ->on('callvers')
            ->onDelete('cascade');

            $table->foreign('callverStatus_id')
            ->references('id')
            ->on('callverstatuses')
            ->onDelete('cascade');

            $table->foreign('ispId_id')
            ->references('id')
            ->on('isps')
            ->onDelete('cascade');

            $table->foreign('problemsolution_id')
            ->references('id')
            ->on('problemsolutions')
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


