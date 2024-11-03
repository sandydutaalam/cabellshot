<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_type_photographer')->insert([
            [
                'event_type_id' => 1,
                'user_id' => 1,
            ],
            [
                'event_type_id' => 2,
                'user_id' => 2,
            ],
            [
                'event_type_id' => 3,
                'user_id' => 3,
            ],
        ]);
    }
}
