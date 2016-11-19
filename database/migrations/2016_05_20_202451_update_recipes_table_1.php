<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRecipesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('recipes', function ($table) {
            $table->text('instructions')->after('name');
		});
		
		Schema::table('ingredient_recipe', function ($table) {
            $table->string('note')->after('unit');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function ($table) {
			$table->dropColumn(['instructions']);
		});
		
        Schema::table('ingredient_recipe', function ($table) {
			$table->dropColumn(['note']);
		});
    }
}
