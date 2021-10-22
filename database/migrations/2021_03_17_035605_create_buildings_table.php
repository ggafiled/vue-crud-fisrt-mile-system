<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('technician_id')->unsigned();//รหัส_ช่าง
            $table->bigInteger('areas_id')->unsigned();//รหัส_พื้นที่
            $table->bigInteger('bbns_id')->unsigned();//รหัส_พื้นที่bbn
            $table->bigInteger('area3bb_id')->unsigned();//รหัส_พื้นที่สามบีบี
            $table->bigInteger('areaAis_id')->unsigned();//รหัส_พื้นที่เอไอเอส
            $table->bigInteger('areaTrue_id')->unsigned();//รหัส_พื้นที่ทรู
            $table->bigInteger('areaTrueNew_id')->unsigned();//รหัส_พื้นที่ทรูใหม่
            $table->bigInteger('areaFibernet_id')->unsigned();//รหัส_พื้นที่ทไฟเน็ต
            $table->string('projectName')->nullable();//ชื่ออาคาร
            $table->string('subBuildingsum')->nullable();//อาคารทั้งหมด
            $table->string('floorSum')->nullable();//ชั้นทั้งหมด
            $table->string('roomSum')->nullable();//ห้องทั้งหมด
            $table->string('nameManager')->nullable();//ชื่อผู้จัดการ
            $table->string('phoneManager')->nullable();//เบอร์โทรผู้จัดการ
            $table->string('mailManager')->nullable();//เมลล์โทรผู้จัดการ
            $table->string('nameNiti')->nullable();//ชื่อนิติบุคคล
            $table->string('phoneNiti')->nullable();//เบอร์์นิติบุคคล
            $table->string('mailNiti')->nullable();//เมลล์์นิติบุคคล
            $table->string('nameTechnician')->nullable();//ชื่อช่าง
            $table->string('phoneTechnician')->nullable();//เบอร์์ช่าง
            $table->string('mailTechnician')->nullable();//เมลล์์ช่าง
            $table->string('houseNumber')->nullable();//บ้านเลขที่
            $table->string('squadNumber')->nullable();//หมู่
            $table->string('alleyName')->nullable();//ซอย
            $table->string('roadName')->nullable();//ถนน
            $table->string('districtName')->nullable();//ตำบล/เขต
            $table->string('provinceName')->nullable();//จังหวัด
            $table->string('countyName')->nullable();//อำเภอ/แขวง
            $table->integer('postalCode')->nullable();//รหัสไปรษณีย์
            $table->double('latitude')->nullable();//แลตติจูด
            $table->double('longitude')->nullable();//ลองติจูด
            $table->date('contractStartDate')->nullable();//วันทำสัญยา
            $table->bigInteger('paymentType_id')->unsigned();//รหัส_ชนิดค่าใช้พื้นที่
            $table->bigInteger('saleFm_id')->unsigned();//รหัส_รายชื่อเซลล์
            $table->string('contractTerm')->nullable();//อายุสัญญา
            $table->date('contractEndDate')->nullable();//วันสิ้นสุดสัญญา
            $table->string('balance')->nullable();//ยอดเงิน
            $table->string('remarkContract')->nullable();//รายละเอียดสัญญา
            $table->bigInteger('workTime_id')->unsigned();//
            $table->string('remark')->nullable();//รายละเอียด
            $table->string('statusBuilding')->nullable();//สถานะตึก
            $table->timestamps();
            $table->softDeletes();


            // $table->foreign('technician_id')
            // ->references('id')
            // ->on('technicians')
            // ->onDelete('cascade');

            $table->foreign('areas_id')
            ->references('id')
            ->on('areas')
            ->onDelete('cascade');

            $table->foreign('bbns_id')
            ->references('id')
            ->on('bbns')
            ->onDelete('cascade');

            $table->foreign('area3bb_id')
            ->references('id')
            ->on('area3bbs')
            ->onDelete('cascade');

            $table->foreign('areaAis_id')
            ->references('id')
            ->on('area_ais')
            ->onDelete('cascade');

            $table->foreign('areaTrue_id')
            ->references('id')
            ->on('area_trues')
            ->onDelete('cascade');

            $table->foreign('areaTrueNew_id')
            ->references('id')
            ->on('area_true_news')
            ->onDelete('cascade');

            $table->foreign('areaFibernet_id')
            ->references('id')
            ->on('area_fiber_nets')
            ->onDelete('cascade');

            $table->foreign('paymentType_id')
            ->references('id')
            ->on('payments')
            ->onDelete('cascade');

            $table->foreign('saleFm_id')
            ->references('id')
            ->on('salefms')
            ->onDelete('cascade');

            $table->foreign('workTime_id')
            ->references('id')
            ->on('worktimes')
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
        Schema::dropIfExists('buildings');
    }
}
