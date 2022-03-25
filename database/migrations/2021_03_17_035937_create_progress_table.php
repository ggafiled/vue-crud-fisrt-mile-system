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
            $table->bigInteger('zone_id')->unsigned()->nullable();
            $table->bigInteger('fmProgress_id')->unsigned()->nullable();
            $table->date('dateFm')->nullable();
            $table->bigInteger('aisProgress_id')->unsigned()->nullable();
            $table->date('dateAis')->nullable();
            $table->bigInteger('totProgress_id')->unsigned()->nullable();
            $table->date('dateTot')->nullable();
            $table->bigInteger('progress3bb_id')->unsigned()->nullable();
            $table->date('date3BB')->nullable();
            $table->bigInteger('trueProgress_id')->unsigned()->nullable();
            $table->date('dateTrue')->nullable();
            $table->bigInteger('txrtProgress_id')->unsigned()->nullable();
            $table->date('dateTxrx')->nullable();
            $table->bigInteger('symphonyProgress_id')->unsigned()->nullable();
            $table->date('dateSymphony')->nullable();
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

            $table->foreign('trueProgress_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('txrtProgress_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('symphonyProgress_id')
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
