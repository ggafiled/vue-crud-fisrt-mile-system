<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\TeamZone;
class TeamZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamzones = [
            [
                'zone_id' => '1',
                'name' => 'member1',
                'tel' => '123',
                'email' => '1@test.com',
                'status' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'zone_id' => '1',
                'name' => 'member2',
                'tel' => '123',
                'email' => '2@test.com',
                'status' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'zone_id' => '2',
                'name' => 'member1',
                'tel' => '456',
                'email' => '1@test.com',
                'status' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        TeamZone::insert($teamzones);
    }
}
