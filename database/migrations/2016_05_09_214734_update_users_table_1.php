<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function ($table) {
			$table->string('first_name')->after('name');
			$table->string('last_name')->after('first_name');
			$table->string('phone', 10)->after('email');
			$table->string('address1')->after('phone');
			$table->string('address2')->after('address1');
			$table->string('city')->after('address2');
			$table->smallInteger('state_id')->unsigned()->after('city');
			$table->string('zip', 42)->after('state_id');
			$table->tinyInteger('country_id')->unsigned()->after('zip');
			$table->boolean('optin')->nullable()->after('country_id');
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
			$table->dropColumn(['first_name', 'last_name', 'phone', 'address1', 'address2', 'city', 'state_id', 'zip', 'country_id', 'optin']);
		});
    }
}
