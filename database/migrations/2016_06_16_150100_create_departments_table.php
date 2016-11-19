<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        
        Schema::table('ingredients', function ($table) {
			$table->integer('department_id')->unsigned()->nullable()->index();
			$table->foreign('department_id')->references('id')->on('departments');
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
			$table->dropForeign('ingredients_department_id_foreign');
			$table->dropColumn(['department_id']);
		});
		Schema::drop('foods');
    }
}
