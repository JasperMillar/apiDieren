<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class animalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animal')->insert([
            'name' => 'kraai',
            'species_id' => 1
        ]);
        DB::table('animal')->insert([
            'name' => 'duif',
            'species_id' => 1
        ]);
        DB::table('animal')->insert([
            'name' => 'merel',
            'species_id' => 1
        ]);
        DB::table('animal')->insert([
            'name' => 'mees',
            'species_id' => 1
        ]);
        DB::table('animal')->insert([
            'name' => 'salamander',
            'species_id' => 2
        ]);
        DB::table('animal')->insert([
            'name' => 'slang',
            'species_id' => 2
        ]);
        DB::table('animal')->insert([
            'name' => 'Schildpad',
            'species_id' => 2
        ]);
        DB::table('animal')->insert([
            'name' => 'olifant',
            'species_id' => 3
        ]);
        DB::table('animal')->insert([
            'name' => 'kangeroe',
            'species_id' => 3
        ]);
        DB::table('animal')->insert([
            'name' => 'hert',
            'species_id' => 3
        ]);
        DB::table('animal')->insert([
            'name' => 'mier',
            'species_id' => 4
        ]);
        DB::table('animal')->insert([
            'name' => 'spin',
            'species_id' => 4
        ]);
        DB::table('animal')->insert([
            'name' => 'duizendloper',
            'species_id' => 4
        ]);


    }
}
