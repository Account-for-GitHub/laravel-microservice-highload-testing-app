<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HighloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('highloads')->insert([
            'user_id' => 1,
            'url' => 'http://localhost',
            'quantity' => 3,
            'request_json' => '{}',
        ]);
    }
}
