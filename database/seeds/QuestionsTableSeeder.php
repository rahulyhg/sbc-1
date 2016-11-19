<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('questions')->insert([
            'question' => 'Are you more likely to stick to a diet if you have an exact meal plan and workout?',
            'group' => 'a',
            'position' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'Do you prefer exact instructions when starting a new project?',
            'group' => 'a',
            'position' => 2,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'Does having the freedom to create your own meal plans make it too easy for you to go overboard and cheat?',
            'group' => 'a',
            'position' => 3,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'Have you successfully lost weight in the past and kept it off for at least 3 months using an exact, done-for-you meal plan?',
            'group' => 'a',
            'position' => 4,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'Are you too busy to create a meal plan but will follow one if it’s given to you?',
            'group' => 'a',
            'position' => 5,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'If given a list of healthy ingredients do you prefer to create your own meal plans?',
            'group' => 'b',
            'position' => 6,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'When assembling furniture, do you ignore the instructions and try to figure it out on your own first?',
            'group' => 'b',
            'position' => 7,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'Do you prefer having flexibility in a diet?',
            'group' => 'b',
            'position' => 8,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
    	DB::table('questions')->insert([
            'question' => 'Does having a strict daily meal plan and workout make it more stressful for you to stick to a diet?',
            'group' => 'b',
            'position' => 9,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
