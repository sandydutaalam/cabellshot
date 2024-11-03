<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('event_types')->insert([
            [
                'type' => 'Sports',
                'created_at' => now(),  // Menambahkan created_at
                'updated_at' => now(),  // Menambahkan updated_at
            ],
            [
                'type' => 'Wedding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Event',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
