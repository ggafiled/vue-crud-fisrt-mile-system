<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterIspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isps', function (Blueprint $table) {
            $table->string('isps_color');
            $table->string('isps_map_icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isps', function (Blueprint $table) {
            $table->dropColumn('isps_color');
            $table->dropColumn('isps_map_icon');
        });
    }
}