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
                'name' => 'testname',
                'surname' => 'testsurname',
                'tel' => '123',
                'tel2' => '123',

                'email' => '1@test.com',
                'status' => '-',
                'remark' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        TeamZone::insert($teamzones);
    }
}
