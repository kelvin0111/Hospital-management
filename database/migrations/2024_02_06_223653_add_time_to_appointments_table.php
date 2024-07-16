<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->date('appointment_date')->after('appointment_datetime')->nullable();
            $table->time('appointment_time')->after('appointment_date')->nullable();
            // Add the new time column after the existing 'date' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('appointment_date');
            $table->dropColumn('appointment_time');            // Drop the 'appointment_time' column if rolling back the migration
        });
    }
}
