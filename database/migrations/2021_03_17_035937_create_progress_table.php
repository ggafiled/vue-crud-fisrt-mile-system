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
            $table->bigInteger('statusFm_id')->nullable();
            $table->timestamp('dateFm')->nullable();
            $table->bigInteger('statusTot_id')->nullable();
            $table->timestamp('dateTot')->nullable();
            $table->bigInteger('statusAis_id')->nullable();
            $table->timestamp('dateAis')->nullable();
            $table->bigInteger('status3BB_id')->nullable();
            $table->timestamp('date3BB')->nullable();
            $table->bigInteger('statusSinet_id')->nullable();
            $table->timestamp('dateSinet')->nullable();
            $table->bigInteger('statusFn_id')->nullable();
            $table->timestamp('dateFn')->nullable();
            $table->bigInteger('statusTrue_id')->nullable();
            $table->timestamp('dateTrue')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('building_id')
                ->references('id')
                ->on('buildings')
                ->onDelete('cascade');

            $table->foreign('statusFm_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('statusTot_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('statusAis_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('status3BB_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('statusSinet_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('statusFn_id')
                ->references('id')
                ->on('generatingactions')
                ->onDelete('cascade');

            $table->foreign('statusTrue_id')
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
