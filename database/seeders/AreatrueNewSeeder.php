<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaTrueNew;
class AreatrueNewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AreaTrueNews = [
            [
                'AreaTrueNew' => 'BMA 1 (North West)',
            ],
            [
                'AreaTrueNew' => 'BMA 2 (South West)',
            ],
            [
                'AreaTrueNew' => 'BMA 3 (North East)',
            ],
            [
                'AreaTrueNew' => 'BMA 4 (South East)',
            ],
            [
                'AreaTrueNew' => 'BMA 5 (Central)',
            ]
        ];
        AreaTrueNew::insert($AreaTrueNews);
    }
}
