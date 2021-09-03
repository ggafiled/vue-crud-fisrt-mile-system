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
            $table->bigInteger('building_id')->unsigned();
            $table->bigInteger('fmProgress_id')->unsigned();
            $table->bigInteger('totProgress_id')->unsigned();
            $table->bigInteger('progress3bb_id')->unsigned();
            $table->bigInteger('sinetProgress_id')->unsigned();
            $table->bigInteger('fnProgress_id')->unsigned();
            $table->bigInteger('trueProgress_id')->unsigned();
            // $table->string('fmProgress')->nullable();
            $table->timestamp('dateFm')->nullable();
            // $table->string('totProgress')->nullable();
            $table->timestamp('dateTot')->nullable();
            // $table->string('aisProgress')->nullable();
            $table->timestamp('dateAis')->nullable();
            // $table->string('Progress3bb')->nullable();\
            $table->timestamp('date3BB')->nullable();
            // $table->string('sinetProgress')->nullable();
            $table->timestamp('dateSinet')->nullable();
            // $table->string('fnProgress')->nullable();
            $table->timestamp('dateFn')->nullable();
            // $table->string('trueProgress')->nullable();
            $table->timestamp('dateTrue')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
                ->references('id')
                ->on('buildings')
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
