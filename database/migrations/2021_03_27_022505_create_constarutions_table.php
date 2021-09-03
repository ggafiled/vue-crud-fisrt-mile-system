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
            $table->bigInteger('desingBy_id')->unsigned();
            $table->bigInteger('surveyDesing_id')->unsigned();
            $table->bigInteger('ifcc_id')->unsigned();
            $table->bigInteger('wallBox_id')->unsigned();
            $table->bigInteger('microductD_id')->unsigned();
            $table->bigInteger('microductK_id')->unsigned();
            $table->bigInteger('fiberConvertion_id')->unsigned();
            $table->string('projectNameTot')->nullable();
            $table->string('projectName3bb')->nullable();
            $table->string('projectNameTrue')->nullable();
            $table->string('projectNameAis')->nullable();
            $table->string('projectNameFiberNet')->nullable();
            // $table->string('surveyDesing')->nullable();
            $table->timestamp('surveyDesingDate')->nullable();
            // $table->string('ifcc')->nullable();
            $table->timestamp('ifccDate')->nullable();
            // $table->string('wallBox')->nullable();
            $table->timestamp('wallBoxDate')->nullable();
            $table->string('type')->nullable();
            // $table->string('microductD')->nullable();
            $table->timestamp('microductDateD')->nullable();
            // $table->string('microductK')->nullable();
            $table->timestamp('microductDateK')->nullable();
            // $table->string('fiberConvertion')->nullable();
            $table->timestamp('fiberConvertionDateD')->nullable();
            $table->string('blow')->nullable();
            $table->string('splice')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');

            $table->foreign('desingBy_id')
            ->references('id')
            ->on('teamserways')
            ->onDelete('cascade');

            $table->foreign('surveyDesing_id')
            ->references('id')
            ->on('generatingactions')
            ->onDelete('cascade');

            $table->foreign('ifcc_id')
            ->references('id')
            ->on('generatingactions')
            ->onDelete('cascade');

            $table->foreign('wallBox_id')
            ->references('id')
            ->on('generatingactions')
            ->onDelete('cascade');

            $table->foreign('microductD_id')
            ->references('id')
            ->on('generatingactions')
            ->onDelete('cascade');

            $table->foreign('microductK_id')
            ->references('id')
            ->on('generatingactions')
            ->onDelete('cascade');

            $table->foreign('fiberConvertion_id')
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
        Schema::dropIfExists('constarutions');
    }
}
