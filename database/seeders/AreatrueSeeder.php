<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Areatrue;
class AreatrueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Areatrues = [
            [
                'areaTrue' => 'BMA 1',
            ],
            [
                'areaTrue' => 'BMA 2',
            ],
            [
                'areaTrue' => 'BMA 3',
            ],
            [
                'areaTrue' => 'BMA 4',
            ],
            [
                'areaTrue' => 'BMA 5',
            ],
            [
                'areaTrue' => 'BMA 6',
            ],
            [
                'areaTrue' => 'BMA 7',
            ],
            [
                'areaTrue' => 'BMA 8',
            ],
            [
                'areaTrue' => 'BMA 9',
            ],
            [
                'areaTrue' => 'BMA 10',
            ],
            [
                'areaTrue' => 'BMA 11',
            ],
            [
                'areaTrue' => 'N/A',
            ],
        ];
        Areatrue::insert($Areatrues);
    }
}
