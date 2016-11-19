<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->smallInteger('days')->unsigned()->nullable();
            $table->timestamps();
        });
        
        Schema::create('program_user', function(Blueprint $table)
		{
			$table->integer('program_id')->unsigned()->index();
			$table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
	
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			
			$table->date('program_start');
			$table->boolean('active');
			
			$table->primary(['program_id', 'user_id']);
			
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
        Schema::drop('program_user');
		
        Schema::drop('programs');
    }
}
