<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstarutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('constarutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('building_id')->unsigned();
            $table->string('desingBy')->nullable();
            $table->string('surveyDesing')->nullable();
            $table->timestamp('surveyDesingDate')->nullable();
            $table->string('ifcc')->nullable();
            $table->timestamp('ifccDate')->nullable();
            $table->string('wallBox')->nullable();
            $table->timestamp('wallBoxDate')->nullable();
            $table->string('type')->nullable();
            $table->string('microductD')->nullable();
            $table->timestamp('microductDateD')->nullable();
            $table->string('microductK')->nullable();
            $table->timestamp('microductDateK')->nullable();
            $table->string('fiberConvertion')->nullable();
            $table->timestamp('fiberConvertionDateD')->nullable();
            $table->string('blow')->nullable();
            $table->string('splice')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
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
        Schema::dropIfExists('constarutions');
    }
}
