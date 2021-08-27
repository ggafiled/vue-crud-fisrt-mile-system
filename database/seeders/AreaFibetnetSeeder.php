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
        $areaFiberNets = [
            [
                'areaFiberNet' => 'YES',
            ],
            [
                'areaFiberNet' => 'N/A',
            ],
        ];
        AreaFiberNet::insert($areaFiberNets);
    }
}
