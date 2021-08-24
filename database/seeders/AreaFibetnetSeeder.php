<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaFiberNet;
class AreaFibetNetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areaFibetNets = [
            [
                'areaFibetNet' => 'YES',
            ],
            [
                'areaFibetNet' => 'N/A',
            ],
        ];
        AreaFiberNet::insert($areaFibetNets);
    }
}
