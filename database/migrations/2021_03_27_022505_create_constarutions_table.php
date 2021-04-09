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
            $table->string('surveyDesing')->nullable();
            $table->timestamp('surveyDesingTeam')->nullable();
            $table->timestamp('surveyDesingDate')->nullable();
            $table->timestamp('surveyDesingDateBy')->nullable();
            $table->bigInteger('surveyDesingBy')->unsigned();
            $table->string('ifcc')->nullable();
            $table->bigInteger('ifccTeam')->unsigned();
            $table->timestamp('ifccDate')->nullable();
            $table->string('wallBox')->nullable();
            $table->bigInteger('wallBoxTeam')->unsigned();
            $table->timestamp('wallBoxDate')->nullable();
            $table->string('microductD')->nullable();
            $table->bigInteger('microductTeamD')->unsigned();
            $table->timestamp('microductDateD')->nullable();
            $table->string('microductK')->nullable();
            $table->bigInteger('microductTeamK')->unsigned();
            $table->timestamp('microductDateK')->nullable();
            $table->timestamps();

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');
            $table->foreign('surveyDesingBy')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade');
            $table->foreign('ifccTeam')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade');
            $table->foreign('wallBoxTeam')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade');
            $table->foreign('microductTeamD')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade');
            $table->foreign('microductTeamK')
            ->references('id')
            ->on('teams')
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