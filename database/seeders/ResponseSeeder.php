<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('responses')->insert([
            ['highload_id' => 1, 'status' => 200, 'response' => "{}"],
            ['highload_id' => 1, 'status' => 200, 'response' => "{}"],
            ['highload_id' => 1, 'status' => 200, 'response' => "{}"],
        ]);
    }
}
