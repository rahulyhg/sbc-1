<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function ($table) {
			$table->smallInteger('weight')->unsigned()->nullable()->after('gender'); // store kg
			$table->smallInteger('weight_goal')->unsigned()->nullable()->after('weight'); // store kg
			$table->tinyInteger('height')->unsigned()->nullable()->after('weight_goal'); // store cm
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
			$table->dropColumn(['weight', 'weight_goal', 'height']);
		});
    }
}
