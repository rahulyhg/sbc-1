<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIngredientsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function ($table) {
			$table->integer('food_id')->unsigned()->nullable()->index();
			$table->foreign('food_id')->references('id')->on('foods');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function ($table) {
			$table->dropForeign('ingredients_category_id_foreign');
			$table->dropColumn(['food_id']);
		});
    }
}
