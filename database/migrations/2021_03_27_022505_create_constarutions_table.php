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
            $table->id();
            $table->string('buildingId')->index();
            $table->integer('numberLayer')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('roomNumber')->nullable();

            $table->string('exploreDesign')->nullable();
            $table->string('exploreDesignTeam')->nullable();
            $table->date('exploreDesignDate')->nullable();
            $table->string('exploreDesignBy')->nullable();
            $table->date('exploreDesignDateBy')->nullable();

            $table->string('ifcc')->nullable();
            $table->string('ifccTeam')->nullable();
            $table->date('ifccDate')->nullable();

            $table->string('wallBox')->nullable();
            $table->string('wallBoxTeam')->nullable();
            $table->date('wallBoxDate')->nullable();

            $table->string('microductD')->nullable();
            $table->string('microductTeamD')->nullable();
            $table->date('microductDateD')->nullable();

            $table->string('microductK')->nullable();
            $table->string('microductTeamK')->nullable();
            $table->date('microductDateK')->nullable();
            $table->timestamps();
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
