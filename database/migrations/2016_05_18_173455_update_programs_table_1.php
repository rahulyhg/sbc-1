<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProgramsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('programs', function ($table) {
            $table->text('type')->after('id');
            $table->text('description')->after('name');
            $table->string('short_description')->after('description');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function ($table) {
			$table->dropColumn(['type', 'description', 'short_description']);
		});
    }
}
