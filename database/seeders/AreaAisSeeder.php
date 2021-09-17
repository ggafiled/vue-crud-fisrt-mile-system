<?php

namespace Database\Seeders;

use App\Models\AreaAis;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AreaAisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AreaAiss = [
            [
                'AreaAis' => 'YES',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'AreaAis' => 'N/A',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
        ];
        AreaAis::insert($AreaAiss);
    }
}