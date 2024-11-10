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
        $photograpers = [
            [
                'name' => 'Panji',
                'event_type_id' => 1,
            ],
            [
                'name' => 'Rafael',
                'event_type_id' => 2,
            ],
            [
                'name' => 'Arbi',
                'event_type_id' => 3,
            ],
            [
                'name' => 'Satria',
                'event_type_id' => 3,
            ],
        ];

        DB::table('photographers')->insert($photograpers);
    }
}
