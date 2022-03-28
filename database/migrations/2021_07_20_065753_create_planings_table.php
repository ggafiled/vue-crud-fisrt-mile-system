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
            $table->string('task_id')->nullable();
            $table->bigInteger('building_id')->unsigned();//ชื่อตึก
            $table->bigInteger('isp_id')->unsigned();//ispค่ายเน็ต
            $table->bigInteger('agentDetail_id')->unsigned();//ตัวแทน/พื้นที่
            $table->bigInteger('jobtype_id')->unsigned();//ประเภทงาน
            $table->bigInteger('zone_id')->unsigned();//ชื่อช่าง
            $table->bigInteger('zone2_id')->unsigned();//ชื่อช่าง
            $table->bigInteger('ispId_id')->unsigned();//ผู้ให้ บริการ
            $table->string('type')->nullable();//Type งาน
            $table->string('name')->nullable();//ชื่อ/บริษัท
            $table->string('surname')->nullable();//นามสกุล
            $table->string('tel')->nullable();//เบอร์โทร
            $table->string('tel2')->nullable();//เบอร์โทร2
            $table->string('theBuilding')->nullable();//อาคาร
            $table->string('floor')->nullable();//ชั้น
            $table->string('room')->nullable();//ห้อง / เลขที่
            $table->string('circuit')->nullable();//เลขสมาชิก
            $table->string('entranceFee')->nullable();//ค่าแรกเข้า (฿)
            $table->date('appointmentDate')->nullable();//วันนัดหมาย
            $table->time('appointmentTime')->nullable();//เวลานัดหมาย ในระบบ
            $table->string('status')->nullable();
            $table->string('subStatus')->nullable();//Sub-Status
            $table->string('reMark')->nullable();//รีมาร์ค (For Admin)

            $table->bigInteger('callver_id')->unsigned();// โทรยืนยัดนัดหมาย
            $table->bigInteger('callverStatus_id')->unsigned();//สถานะการยืนยันนัดหมาย
            $table->bigInteger('problemsolution_id')->unsigned();//สถานะงาน
            $table->time('appointmentTimeCustomer')->nullable();//เวลานัดหมาย ในระบบ
            $table->string('idRequired')->nullable();//ID ที่ต้องใช้
            $table->date('confirmAppointment')->nullable();//วันนัดหมาย
            $table->time('confirmAppointmentTime')->nullable();//เวลานัดหมาย
            $table->string('reMarkzone')->nullable();//รีมาร์ค (For Zone)
            $table->string('equipmentInstall1')->nullable();//อุปกรณ์ที่ใช้ติดตั้ง1
            $table->string('snInstall1')->nullable();// S/Nที่ใช้ติดตั้ง1
            $table->string('equipmentInstall2')->nullable();//อุปกรณ์ที่ใช้ติดตั้ง2
            $table->string('snInstall2')->nullable();// S/Nที่ใช้ติดตั้ง2
            $table->string('equipmentInstall3')->nullable();//อุปกรณ์ที่ใช้ติดตั้ง3
            $table->string('snInstall3')->nullable();// S/Nที่ใช้ติดตั้ง3
            $table->string('equipmentInstall4')->nullable();//อุปกรณ์ที่ใช้ติดตั้ง4
            $table->string('snInstall4')->nullable();// S/Nที่ใช้ติดตั้ง4
            $table->string('equipmentInstall5')->nullable();//อุปกรณ์ที่ใช้ติดตั้ง5
            $table->string('snInstall5')->nullable();// S/Nที่ใช้ติดตั้ง5
            $table->string('equipmentInstall6')->nullable();//อุปกรณ์ที่ใช้ติดตั้ง6
            $table->string('snInstall6')->nullable();// S/Nที่ใช้ติดตั้ง6
            $table->string('equipmentInstall7')->nullable();//อุปกรณ์ที่ใช้ติดตั้ง7
            $table->string('snInstall7')->nullable();// S/Nที่ใช้ติดตั้ง7


            $table->string('statusContrater')->nullable();// สถานะ
            $table->date('dateConnect')->nullable();//Date Connect
            $table->date('dateDisconnect')->nullable();//Date Disconnect
            $table->string('workSheet')->nullable();// ใบงาน
            $table->string('reMarkAccount')->nullable();// รีมาร์ค (บัญชี)
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

            $table->foreign('agentDetail_id')
            ->references('id')
            ->on('agents')
            ->onDelete('cascade');

            $table->foreign('jobtype_id')
            ->references('id')
            ->on('job_tpyes')
            ->onDelete('cascade');

            $table->foreign('zone_id')
            ->references('id')
            ->on('zones')
            ->onDelete('cascade');

            $table->foreign('zone2_id')
            ->references('id')
            ->on('zones')
            ->onDelete('cascade');


            $table->foreign('ispId_id')
            ->references('id')
            ->on('isps')
            ->onDelete('cascade');

            $table->foreign('callverStatus_id')
            ->references('id')
            ->on('callverstatuses')
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
