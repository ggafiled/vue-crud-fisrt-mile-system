<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaTrueNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_true_news', function (Blueprint $table) {
            $table->id();
            $table->string('areaTrueNew')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**Schema::create('area_trues', function (Blueprint $table) {
            $table->id();
            $table->string('areaTrueNew')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_true_news');
    }
}
