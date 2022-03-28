<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_zones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained();
            $table->string('name')->nullable();
<<<<<<< HEAD
            // $table->string('surname')->nullable();
=======
            $table->string('surname')->nullable();
            $table->date('date')->nullable();
>>>>>>> a851f1d1d36e11641d33720a955c1c0e15223a47
            $table->string('tel')->nullable();
            $table->string('tel2')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('team_zones');
    }
}
