<?php

use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publisher')->insert([
            'name' => 'Pr0ject Zer0',
        ]);
        DB::table('publisher')->insert([
            'name' => 'Electronic Arts',
        ]);
        DB::table('publisher')->insert([
            'name' => 'Square Enix',
        ]);
        DB::table('publisher')->insert([
            'name' => 'Nintendo',
        ]);
        DB::table('publisher')->insert([
            'name' => 'Sony',
        ]);
        DB::table('publisher')->insert([
            'name' => 'Ubisoft',
        ]);
    }
}
