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
                'zoneName' => 'DCL',
                'zoneTel' => '-',
                'zoneEmail' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'zoneName' => 'LKB',
                'zoneTel' => '-',
                'zoneEmail' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'zoneName' => 'PKR',
                'zoneTel' => '-',
                'zoneEmail' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'zoneName' => 'KTW',
                'zoneTel' => '-',
                'zoneEmail' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'zoneName' => 'PTN',
                'zoneTel' => '-',
                'zoneEmail' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
        ];
        Zone::insert($Zone);
    }
}
