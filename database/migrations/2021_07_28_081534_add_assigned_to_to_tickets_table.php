<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssignedToToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('tickets', function (Blueprint $table) {
        //     $table->integer('assigned_to')->unsigned()->nullable()->after('ticket_id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('tickets', function (Blueprint $table) {
        //     $table->dropColumn('assigned_to');
        // });
    }
}
