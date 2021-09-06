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
            $table->bigInteger('building_id')->unsigned();//ชื่อตึก
            $table->bigInteger('isp_id')->unsigned();//ispค่ายเน็ต
            $table->bigInteger('jobtype_id')->unsigned();//ประเภทงาน
            $table->bigInteger('technician_id')->unsigned();//ชื่อช่าง
            $table->bigInteger('callver_id')->unsigned();//จำนวนการติดต่อ
            $table->bigInteger('callverStatus_id')->unsigned();//สถานะการติดต่อ
            $table->bigInteger('ispId_id')->unsigned();//ผู้ให้ บริการ
            $table->bigInteger('problemsolution_id')->unsigned();//ปัญหาและวิธีการแก้ไข
            $table->string('name')->nullable();//ชื่อ
            $table->string('surname')->nullable();//นามสกุล
            $table->string('tel')->nullable();//เบอร์โทร
            $table->string('tel2')->nullable();//เบอร์โทร2
            $table->string('theBuilding')->nullable();//อาคาร
            $table->string('floor')->nullable();//ชั้น
            $table->string('room')->nullable();//ห้อง / เลขที่
            // $table->string('isp')->nullable();
            $table->string('agent')->nullable();//ตัวแทน/พื้นที่
            $table->string('circuit')->nullable();//เลขสมาชิก
            $table->string('entranceFee')->nullable();//ค่าแรกเข้า (฿)
            // $table->string('jobType')->nullable();
            $table->date('appointmentDate')->nullable();//วันนัดหมาย
            $table->time('appointmentTime')->nullable();//เวลานัดหมาย ในระบบ
            // $table->string('idRequired')->nullable();
            $table->string('status')->nullable();
            $table->string('subStatus')->nullable();//Sub-Status
            $table->string('reMark')->nullable();//รีมาร์ค (For Admin)

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


