<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWorkoutTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workouts', function(Blueprint $table)
        {
            $table->dropColumn("length");
        });

        Schema::table('workouts', function(Blueprint $table)
        {
            $table->float('length')->after("video");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropColumn(['length']);
        });
    }
}
