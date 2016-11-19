<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('programs')->insert([
            'type' => 'a',
            'name' => 'Navigator',
            'description' => 'You are a Navigator (Map Follower, Autopilot)! You prefer that someone else do the heavy lifting when it comes to your meal plans and workouts so you can simply follow what works without having to worry about willpower. Having a done-for-you weight loss program in the Summer Body Club lets you focus on the important things like fun in the sun, pool parties, and backyard BBQs!',
            'short_description' => 'Simply follow what works without having to worry about willpower.',
            'days' => 84,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        
       DB::table('programs')->insert([
            'type' => 'b',
            'name' => 'Adventurer',
            'description' => 'You are fun-loving and get excited about creating your own adventures in life. You like guidelines but prefer to customize your meal plans and workouts. With the Summer Body Club, you will receive guidelines on weight loss with the ability to choose what foods and workouts are best for you so you feel empowered and confident at beach parties, summer vacations, outdoor BBQs, or enjoying summer sports!',
            'short_description' => 'Customize your meal plans and workouts based on guidelines.',
            //'days' => ,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
