<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        
        Schema::table('workouts', function ($table) {
			$table->integer('category_id')->unsigned()->nullable()->index()->after('name');
			$table->foreign('category_id')->references('id')->on('categories');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workouts', function ($table) {
			$table->dropForeign('workouts_category_id_foreign');
			$table->dropColumn(['category_id']);
		});
        Schema::drop('categories');
    }
}
