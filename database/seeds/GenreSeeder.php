<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre')->insert([
            'name' => 'Actionspiel',
        ]);
        DB::table('genre')->insert([
            'name' => 'Adventure',
        ]);
        DB::table('genre')->insert([
            'name' => 'Casual Game',
        ]);
        DB::table('genre')->insert([
            'name' => 'Rollenspiel',
        ]);
        DB::table('genre')->insert([
            'name' => 'Strategiespiel',
        ]);
        DB::table('genre')->insert([
            'name' => 'Online Spiel',
        ]);
        DB::table('genre')->insert([
            'name' => 'Rennspiel',
        ]);
        DB::table('genre')->insert([
            'name' => 'Ego-Shooter',
        ]);
    }
}
