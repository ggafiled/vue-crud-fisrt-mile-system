<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operater;
class OperaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Operaters = [
            [
                'operaterName' => 'AIS',
            ],
            [
                'operaterName' => 'TOT',
            ],
            [
                'operaterName' => '3BB',
            ],
            [
                'operaterName' => 'AIS & TOT',
            ],
            [
                'operaterName' => 'AIS & 3BB',
            ],
            [
                'operaterName' => 'TOT& 3BB',
            ],
            [
                'operaterName' => 'AIS & TOT & 3BB',
            ],
        ];
        Operater::insert($Operaters);
    }
}
