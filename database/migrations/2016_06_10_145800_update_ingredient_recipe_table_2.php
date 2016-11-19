<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIngredientRecipeTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredient_recipe', function ($table) {
           $table->decimal('quanity_w',3,1)->nullable()->after('quanity_s');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredient_recipe', function ($table) {
			$table->dropColumn(['quanity_w']);
		});
    }
}
