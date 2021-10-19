<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('building_id')->unsigned()->nullable();
            $table->bigInteger('constarution_id')->unsigned()->nullable();
            $table->bigInteger('fmProgress_id')->unsigned()->nullable();
            $table->bigInteger('aisProgress_id')->unsigned()->nullable();
            $table->bigInteger('totProgress_id')->unsigned()->nullable();
            $table->bigInteger('progress3bb_id')->unsigned()->nullable();
            $table->bigInteger('sinetProgress_id')->unsigned()->nullable();
            $table->bigInteger('fnProgress_id')->unsigned()->nullable();
            $table->bigInteger('trueProgress_id')->unsigned()->nullable();
            $table->bigInteger('txrtProgress_id')->unsigned()->nullable();
            // $table->string('fmProgress')->nullable();
            $table->date('dateFm')->nullable();
            // $table->string('totProgress')->nullable();
            $table->date('dateTot')->nullable();
            // $table->string('aisProgress')->nullable();
            $table->date('dateAis')->nullable();
            // $table->string('Progress3bb')->nullable();
            $table->date('date3BB')->nullable();
            // $table->string('sinetProgress')->nullable();
            $table->date('dateSinet')->nullable();
            // $table->string('fnProgress')->nullable();
            $table->date('dateFn')->nullable();
            // $table->string('trueProgress')->nullable();
            $table->date('dateTrue')->nullable();
            $table->date('dateTxrx')->nullable();
            $table->string('statusProgress')->nullable();//สถานะตึก
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
                ->references('id')
                ->on('buildings')
                ->onDelete('cascade');

            $table->foreign('constarution_id')
                ->references('id')
                ->on('constarutions')
                ->onDelete('cascade');


            $table->foreign('fmProgress_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('totProgress_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('progress3bb_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('sinetProgress_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('trueProgress_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('txrtProgress_id')
                ->references('id')
                ->on('generatingactions')
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
        Schema::dropIfExists('progress');
    }
}
