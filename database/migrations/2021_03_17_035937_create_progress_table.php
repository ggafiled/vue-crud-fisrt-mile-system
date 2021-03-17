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
            $table->id()->nullable();
            $table->string('buildingId')->index();
            $table->string('surveyTeam')->nullable();
            $table->string('exploreDesig')->nullable();
            $table->string('ifcc')->nullable();
            $table->string('wallBox')->nullable();
            $table->string('vertical')->nullable();
            $table->string('diagonal')->nullable();
            $table->string('fmProgress')->nullable();
            $table->date('dateProgress')->nullable();
            $table->string('totProgress')->nullable();
            $table->string('aisProgress')->nullable();
            $table->string('3bbProgress')->nullable();
            $table->string('sinetProgress')->nullable();
            $table->string('fnProgress')->nullable();
            $table->string('trueProgress')->nullable();
            $table->string('blow')->nullable();
            $table->string('dateBlow')->nullable();
            $table->string('splice')->nullable();
            $table->string('dateSplice')->nullable();
            $table->string('ready')->nullable();
            $table->string('rail')->nullable();
            $table->string('booth')->nullable();
            $table->string('areaCost')->nullable();
            $table->string('trueProvider')->nullable();
            $table->string('types')->nullable();
            $table->timestamps();

            $table->foreign('buildingId')
                ->references('buildingId')
                ->on('buildings')
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
