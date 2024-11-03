<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'booking_number' => 422701608,
                'service_id' => 1,
                'user_id' => 3,
                'event_type_id' => 1,
                'number_of_guest' => 200,

                'message' => 'rytriyu\r\nuytuyi\r\n\r\njoyuutuyfh',
                'booking_date' => '2024-02-17',
                'remark' => 'Approved',
                'status' => 'Approved',
                'updation_date' => '2024-03-02 05:06:50',
                'payment_proof' => null,
                'payment_proof_type' => null,
                'payment_proof_size' => null,
            ],
            [
                'booking_number' => 697339619,
                'service_id' => 2,
                'user_id' => 4,
                'event_type_id' => 2,
                'number_of_guest' => 200,

                'message' => 'NA',
                'booking_date' => '2024-02-20',
                'remark' => 'Your booking is cancelled',
                'status' => 'Cancelled',
                'updation_date' => '2024-03-02 05:06:57',
                'payment_proof' => null,
                'payment_proof_type' => null,
                'payment_proof_size' => null,
            ],
            [
                'booking_number' => 347642822,
                'service_id' => 4,
                'user_id' => 5,
                'event_type_id' => 2,
                'number_of_guest' => 25,

                'message' => 'NA',
                'booking_date' => '2024-02-27',
                'remark' => 'Approved',
                'status' => 'Approved',
                'updation_date' => '2024-03-02 05:07:07',
                'payment_proof' => null,
                'payment_proof_type' => null,
                'payment_proof_size' => null,
            ],
            [
                'booking_number' => 144316724,
                'service_id' => 1,
                'user_id' => 5,
                'event_type_id' => 1,
                'number_of_guest' => 20,

                'message' => 'NA',
                'booking_date' => '2024-03-14',
                'remark' => 'Okai',
                'status' => 'Approved',
                'updation_date' => '2024-10-20 04:33:12',
                'payment_proof' => null,
                'payment_proof_type' => null,
                'payment_proof_size' => null,
            ],
            [
                'booking_number' => 901857931,
                'service_id' => 1,
                'user_id' => 5,
                'event_type_id' => 3,
                'number_of_guest' => 4,

                'message' => 'Let\'s go',
                'booking_date' => '2024-10-20',
                'remark' => null,
                'status' => null,
                'updation_date' => null,
                'payment_proof' => null,
                'payment_proof_type' => null,
                'payment_proof_size' => null,
            ],
        ]);
    }
}
