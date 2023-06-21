<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class speciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('species')->insert([
            'name' => 'vogel'
        ]);
        DB::table('species')->insert([
            'name' => 'reptiel'
        ]);
        DB::table('species')->insert([
            'name' => 'zoogdier'
        ]);
        DB::table('species')->insert([
            'name' => 'insect'
        ]);
    }
}
