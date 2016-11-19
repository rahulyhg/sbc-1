<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_recipe', function(Blueprint $table)
		{
			$table->integer('program_id')->unsigned()->index();
			$table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
			
			$table->integer('recipe_id')->unsigned()->index();
			$table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
			
			$table->smallInteger('day')->unsigned()->nullable();
			
			$table->primary(['program_id', 'recipe_id']);
		}); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('program_recipe');
    }
}
