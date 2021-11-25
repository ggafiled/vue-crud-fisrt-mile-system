<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('contractors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('building_id')->unsigned();//ชื่อตึก
            $table->bigInteger('callver_id')->unsigned();// โทรยืนยัดนัดหมาย
            $table->time('appointmentTimeCustomer')->nullable();//เวลานัดหมาย ในระบบ
            $table->bigInteger('callverStatus_id')->unsigned();//สถานะการยืนยันนัดหมาย
            $table->bigInteger('technicians_id')->unsigned();//ทีมช่าง
            $table->string('idRequired')->nullable();//ID ที่ต้องใช้
            $table->bigInteger('problemsolution_id')->unsigned();//สถานะงาน
            $table->date('confirmAppointment')->nullable();//วันนัดหมาย
            $table->date('confirmAppointmentTime')->nullable();//เวลานัดหมาย
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
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');

            $table->foreign('callverStatus_id')
            ->references('id')
            ->on('callverstatuses')
            ->onDelete('cascade');

            $table->foreign('technicians_id')
            ->references('id')
            ->on('technicians')
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
        Schema::dropIfExists('contractors');
    }
}
