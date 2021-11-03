<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('building_id')->unsigned();//ชื่อตึก
            $table->bigInteger('customer_id')->unsigned();//ชื่อตึก
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

            $table->foreign('customer_id')
            ->references('id')
            ->on('planings')
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
        Schema::dropIfExists('reports');
    }
}
