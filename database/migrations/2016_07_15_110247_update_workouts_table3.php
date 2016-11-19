<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWorkoutsTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::table('workouts', function(Blueprint $table)
    {
        $table->dropColumn("length");
    });

        Schema::table('workouts', function(Blueprint $table)
        {
            $table->time('length')->after("video");
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

