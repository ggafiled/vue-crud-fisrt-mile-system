<?php

namespace Database\Seeders;

use App\Models\AreaSymphony;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AreaSymphonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AreaSymphonys = [
            [
                'AreaSymphony' => 'YES',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'AreaSymphony' => 'No',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
            [
                'AreaSymphony' => 'N/A',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ],
        ];
        AreaSymphony::insert($AreaSymphonys);
    }
}