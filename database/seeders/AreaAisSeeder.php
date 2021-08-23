<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaAis;
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
            ],
            [
                'AreaAis' => 'N/A',
            ],
        ];
        AreaAis::insert($AreaAiss);
    }
}
