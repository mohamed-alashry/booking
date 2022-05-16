<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'name' => 'c1',
                'room_type_id' => 1,
                'price' => 50
            ],
            [
                'name' => 'c2',
                'room_type_id' => 1,
                'price' => 50
            ],
            [
                'name' => 'c3',
                'room_type_id' => 1,
                'price' => 50
            ],
            [
                'name' => 's1',
                'room_type_id' => 2,
                'price' => 100
            ],
            [
                'name' => 's2',
                'room_type_id' => 2,
                'price' => 100
            ],
            [
                'name' => 's3',
                'room_type_id' => 2,
                'price' => 100
            ],
        ];

        Room::insert($rooms);
    }
}
