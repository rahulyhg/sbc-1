<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function ($table) {
			$table->date('dob')->after('last_name');
			$table->enum('gender', array('m', 'f'))->after('dob');
			$table->string('phone', 42)->change();
			$table->string('zip', 10)->change();
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
			$table->dropColumn(['dob', 'gender']);
		});
    }
}
