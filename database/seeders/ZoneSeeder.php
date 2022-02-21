<?php

namespace Database\Seeders;

use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Zone = [
            [
                'zoneName' => 'NameTest1',
                'zoneTel' => 'TelTest1',
                'zoneEmail' => 'EmailTest1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'zoneName' => 'NameTest2',
                'zoneTel' => 'TelTest2',
                'zoneEmail' => 'EmailTest2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'zoneName' => 'NameTest3',
                'zoneTel' => 'TelTest3',
                'zoneEmail' => 'EmailTest3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
        ];
        Zone::insert($Zone);
    }
}