<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->smallInteger('day')->unsigned()->nullable();
			$table->date('date');
            $table->integer('meal_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('meal_id')
            	->references('id')
            	->on('meals')
            	->onDelete('cascade');
        });
        
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        
        Schema::create('ingredient_recipe', function(Blueprint $table)
		{
			$table->integer('recipe_id')->unsigned()->index();
			$table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
	
			$table->integer('ingredient_id')->unsigned()->index();
			$table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
			
			$table->string('quantity');
			$table->string('unit');
			
			$table->primary(['recipe_id', 'ingredient_id']);
			
			$table->timestamps();
		}); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingredient_recipe');
        Schema::drop('ingredients');
        Schema::drop('recipes');
        Schema::drop('meals');
    }
}
